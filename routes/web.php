<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/show/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('/post/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destoy');
Route::get('/post/force/delete/{id}', [PostController::class, 'forceDelete'])->name('posts.forceDelete');
Route::get('/post/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');



Route::get('audits', [AuditController::class, 'index'])->name('audits.index');
Route::get('audits/{id}', [AuditController::class, 'show'])->name('audits.show');
