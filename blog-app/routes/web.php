<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

// Display a list of all posts
Route::get('/post', [postController::class, 'index'])->name('post.index');

// Display a specific post by its ID
Route::get('/post/{id}', [postController::class, 'show'])->name('post.show');

// Display a form for creating a new post
Route::get('/post/create', [postController::class, 'create'])->name('post.create');

// Store a new post post in the database
Route::post('/post', [postController::class, 'store'])->name('post.store');

// Display a form for editing an existingpost
Route::get('/post/{id}/edit', [postController::class, 'edit'])->name('post.edit');

// Update an existing post in the database
Route::put('/post/{id}', [postController::class, 'update'])->name('post.update');
