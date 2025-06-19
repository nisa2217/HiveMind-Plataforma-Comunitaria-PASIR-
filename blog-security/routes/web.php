<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Redirección de la raíz a la lista pública de posts
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// RUTAS PÚBLICAS (no requieren autenticación)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// RUTAS PROTEGIDAS (requieren login)
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->except(['index', 'show']);

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// RUTAS DE AUTENTICACIÓN
require __DIR__.'/auth.php';
