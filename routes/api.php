<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

//article
Route::resource('article', ArticleController::class)/*->middleware('auth:sanctum')**/;

//comment
Route::controller(CommentController::class)->group(function(){
    Route::post('/comment', 'store')->middleware('auth:sanctum');
    //Route::get('/comment/edit/{comment}', 'edit');
    Route::post('/comment/update/{comment}', 'update');
    Route::get('/comment/delete/{comment}', 'delete');
    Route::get('/comment/index', 'index')->name('comment.index');
    Route::get('/comment/{comment}/accept', 'accept');
    Route::get('/comment/{comment}/reject', 'reject');
});

//Auth
//Route::get('signin', [AuthController::class, 'signin']);
Route::post('registr', [AuthController::class, 'registr']);
//Route::get('signup', [AuthController::class, 'signup'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
