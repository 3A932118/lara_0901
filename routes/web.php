<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name("home.index");
    Route::get('posts', [AdminPostsController::class, 'index'])->name("posts.index");
    Route::get('posts/create', [AdminPostsController::class, 'create'])->name("posts.create");
    Route::post('posts', [AdminPostsController::class, 'store'])->name("posts.store");
    Route::get('posts/{post}/edit', [AdminPostsController::class, 'edit'])->name("posts.edit");
    Route::patch('posts/{post}', [AdminPostsController::class, 'update'])->name("posts.update");
    Route::delete('posts/{post}', [AdminPostsController::class, 'destroy'])->name("posts.destroy");
});
