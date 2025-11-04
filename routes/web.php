<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/import', [ImportController::class, 'show'])->name('show');
    Route::post('/import/json', [ImportController::class, 'json'])->name('import.json');
    Route::post('/import/fakestore', [ImportController::class, 'fakestore'])->name('import.fakestore');

    Route::get('/create', [AdminPostController::class, 'create'])->name('create');
    Route::post('/store', [AdminPostController::class, 'store'])->name('store');
    Route::get('/edit/{post}', [AdminPostController::class, 'edit'])->name('edit');
    Route::put('/update/{post}', [AdminPostController::class, 'update'])->name('update');
    Route::delete('/delete/{post}', [AdminPostController::class, 'destroy'])->name('delete');
});