<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Post routes
    Route::get('/posts',[PostController::class,'index'])->name('post.index');
    Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.delete');
    Route::post('/posts',[PostController::class,'store'])->name('post.store');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('post.update');

//    Category Routes
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);

//    Tag Routes
    Route::resource('tags', \App\Http\Controllers\TagController::class);
//    Comment Routes
    Route::resource('comments', \App\Http\Controllers\CommentController::class);



});

require __DIR__.'/auth.php';
