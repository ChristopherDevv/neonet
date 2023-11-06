<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Models\Post;



Route::get('/like-post/{post}', function (Post $post) {
    $isLiked = $post->checkLike(auth()->user());
    $likes = $post->likes->count();
    return view('livewire.like-post', ['post' => $post, 'isLiked' => $isLiked, 'likes' => $likes]);
});
Route::get('/', [ExploreController::class, 'index'])->name('welcome');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/{user:username}/profile', [PostController::class, 'index'])->name('post.index');
Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/search', [SearchController::class, 'index'])->name('user.search');
Route::post('/search/user', [SearchController::class, 'store'])->name('search.username');

Route::get('/about', [AboutController::class, 'index'])->name('neonet.about');

//MIDDELEWARE

Route::middleware('auth')->group(function () {

    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');

    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::post('/{user:username}/post/{post}', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/images', [ImageController::class, 'store'])->name('image.store');

    //POTS LIKES
    Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
    Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

    //ROUTE PROFILE
    Route::get('{user:username}/edit-profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('{user:username}/edit-profile', [ProfileController::class, 'store'])->name('profile.store');
    
    //USERS FOLLOWERS
    Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
    Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

    //FOLLOWING
    Route::get('/{user:username}/following', [FollowingController::class, 'index'])->name('users.following');

});












