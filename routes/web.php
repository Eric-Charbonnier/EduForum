<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FilePostController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\LocalizationController;

// Public routes

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

// Etudiant routes

Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('etudiant/{etudiantDetail}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('etudiant-edit/{etudiantDetail}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{etudiantDetail}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant-edit/{etudiantDetail}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');

// Authentication routes

Route::get('registration', [CustomAuthController::class, 'create'])->name('auth.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('auth.store');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('user.auth');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.pass');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword'])->name('temp.pass');
Route::get('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.pass');

// Forum routes

Route::get('forum', [ForumPostController::class, 'index'])->name('forum.index');
Route::get('post-create', [ForumPostController::class, 'create'])->name('forum.create');
Route::post('post-create', [ForumPostController::class, 'store'])->name('forum.store');
Route::get('forum/{forumPost}', [ForumPostController::class, 'show'])->name('forum.show');
Route::get('edit/{forumPost}', [ForumPostController::class, 'edit'])->name('forum.edit');
Route::put('edit/{forumPost}', [ForumPostController::class, 'update'])->name('forum.update');
Route::delete('edit/{forumPost}', [ForumPostController::class, 'destroy'])->name('forum.destroy');


// partage de fichiers

Route::get('file', [FilePostController::class, 'index'])->name('files.index');
Route::get('file-upload', [FilePostController::class, 'create'])->name('files.create');
Route::post('file-upload', [FilePostController::class, 'store'])->name('files.store');
Route::put('file/{filePost}', [FilePostController::class, 'update'])->name('files.update');
Route::get('file/{filePost}', [FilePostController::class, 'edit'])->name('files.edit');
Route::delete('file/{filePost}', [FilePostController::class, 'destroy'])->name('files.destroy');
