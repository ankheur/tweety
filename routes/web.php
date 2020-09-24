<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\FollowsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/@{user:username}', [ProfilesController::class, 'show'])->name('profile');
Route::get('/explore', App\Http\Controllers\ExploreController::class)->name('explore');

// Que pour les utilisateurs connectés
Route::middleware('auth')->group(function() {
    Route::get('/home', [TweetsController::class, 'index'])->name('home');
    Route::post('/tweet', [TweetsController::class, 'store'])->name('tweet');
    
    Route::post('/tweet/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'store'])->name('like');
    Route::delete('/tweet/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'destroy']);

    Route::post('/follow/{user:username}', [FollowsController::class, 'store'])->name('follow');
    
    Route::prefix('/profile')->group(function() {
        Route::get('edit', [ProfilesController::class, 'edit']);
        Route::patch('edit', [ProfilesController::class, 'update']);
    });
});

Auth::routes();
