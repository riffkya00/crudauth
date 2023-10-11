<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Post\PostDeleteController;
use App\Http\Controllers\Post\PostEditController;
use App\Http\Controllers\Post\PostStoreController;
use App\Http\Controllers\Post\PostUpdateController;
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

Route::get('/beranda', BerandaController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::post('posts', PostStoreController::class)->name('posts.store');
Route::get('posts/{id}/edit', PostEditController::class)->name('posts.edit');
Route::put('posts/{id}', PostUpdateController::class)->name('posts.update');
Route::delete('posts/{id}', PostDeleteController::class)->name('posts.destroy');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';