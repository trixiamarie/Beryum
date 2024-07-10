<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReccipeCommentController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeIngredientController;
use App\Http\Controllers\RecipeVoteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::with('user')->get();
    return view('landingpage', ['posts' =>$posts]);
});

Route::get('/dashboard', [PostController::class, 'paginate']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/myprofile', function(){
        $user = Auth::user();
        $userId = Auth::id(); 
        $posts = Post::where('user_id', $userId)->with('user','likes','comments')->orderBy('created_at', 'desc')->get();
        return view('userpage', [
            'user' => $user,
            'posts' => $posts
        ]);
    })->name('myprofile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('recipe', RecipeController::class);
    Route::get('/myrecipes', [RecipeController::class, 'myindex'])->name('myrecipes.index');
    Route::resource('recipeingredient', RecipeIngredientController::class);
    Route::resource('recipevote', RecipeVoteController::class);
    Route::resource('recipecomment', ReccipeCommentController::class);
    Route::resource('post', PostController::class);
    Route::resource('ingredient', IngredientController::class);
    Route::resource('friend', FriendController::class);
    Route::resource('friendrequest', FriendRequestController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('postlike', PostLikeController::class);
    Route::resource('postcomment', PostCommentController::class);
    Route::resource('theme', ThemeController::class);
    Route::get('/search', [SearchController::class, 'searchResults'])->name('search');

    //rotta per la paginazione in dashboard
    // Route::get('/posts/paginate', 'PostController@paginate')->name('posts.paginate');
});

require __DIR__.'/auth.php';
