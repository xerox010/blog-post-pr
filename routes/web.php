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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/post/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');