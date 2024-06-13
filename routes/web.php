<?php

use App\Livewire\Posts\ShowPost;
use App\Livewire\Posts\ListPosts;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\UpdatePost;
use Illuminate\Support\Facades\Route;
use App\Livewire\Categories\ShowCategory;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\ListCategories;
use App\Livewire\Categories\UpdateCategory;
use App\Livewire\Todo\ListTodo;

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

Route::prefix('categories')->group(function () {
    Route::get('/', ListCategories::class)->name('categories.index')->lazy(enabled: false);
    Route::get('/create', CreateCategory::class)->name('categories.create');
    Route::get('/{category}/edit', UpdateCategory::class)->name('categories.edit');
    Route::get('/{category}/show', ShowCategory::class)->name('categories.show');
});

Route::prefix('todos')->group(function () {
    Route::get('/', ListTodo::class)->name('todos.index')->lazy(enabled: false);
});