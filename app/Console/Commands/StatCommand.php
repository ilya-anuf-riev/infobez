<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;
use App\Models\StatArticle;
use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use App\Mail\StatMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class StatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $commentCount = Comment::WhereDate('created_at', Carbon::today())->count();
        $ArticleCount = StatArticle::all()->count();
        Mail::to('ilya-belov-20244@mail.ru')->send(new StatMail($commentCount,$ArticleCount));
    }
}
