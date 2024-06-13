<?php

use App\Livewire\Posts\ShowPost;
use App\Livewire\Posts\ListPosts;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\UpdatePost;
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

Route::prefix('posts')->group(function () {
    Route::get('/', ListPosts::class)->name('posts.index')->lazy(enabled: false);
    Route::get('/create', CreatePost::class)->name('posts.create');
    Route::get('/{post}/edit', UpdatePost::class)->name('posts.edit');
    Route::get('/{post}/show', ShowPost::class)->name('posts.show');
});