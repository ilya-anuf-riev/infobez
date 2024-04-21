<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\CommentMail;

class CommentController extends Controller
{

    function index(){
        $comments = DB::table('comments')
                ->join('articles', 'articles.id', 'comments.article_id')
                ->join('users', 'users.id', 'comments.user_id')
                ->select('comments.*','articles.id as article_id', 'articles.title as article', 'users.name')
                ->get();
        // Log::alert($comments);
        return view('comment.index', ['comments' => $comments]);
    }

    function store(Request $request){
        $request->validate([
            'title'=>'required|min:5',
            'desc'=>'required'
        ]);

        $article = Article::findOrFail($request->article_id);

        $comment = new Comment;
        $comment->title = $request->title;
        $comment->desc = $request->desc;
        $comment->user_id = auth()->id();
        $comment->article_id = $request->article_id;
        $res = $comment->save();

        if ($res) Mail::to('ilya-belov-20244@mail.ru')->send(new CommentMail($comment, $article));

        return redirect()->route('article.show', ['article'=>$request->article_id]);
    }

    function edit(Comment $comment){
        Gate::authorize('comment', ['comment'=>$comment]);
        return view('comment.update', ['comment'=>$comment]);
    }

    function delete(Comment $comment){
        Gate::authorize('comment',['comment'=>$comment]);
        return redirect()->route('article.show', ['article'=>1]);
    }
}