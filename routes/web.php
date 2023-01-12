<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LikeController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/busqueda', [HomeController::class, 'store'])->name('home.search');

// rutas del registro de usuarios
Route::get('registro', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('registro', [RegisterController::class, 'store'])->name('register');

// rutas del inicio de sesion
Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

// rutas de verificacion de la cuenta
Route::get('email/verify', [EmailVerificationController::class, 'index'])->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'create'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('email/verification-notification', [EmailVerificationController::class, 'store'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// rutas para restablecer contraseña
Route::get('forgot-password', [PasswordController::class, 'index'])->middleware('guest')->name('password.request');
Route::post('forgot-password', [PasswordController::class, 'store'])->middleware('guest')->name('password.email');
Route::get('reset-password/{token}', [PasswordController::class, 'edit'])->middleware('guest')->name('password.reset');
Route::post('reset-password', [PasswordController::class, 'update'])->middleware('guest')->name('password.update');

Route::get('dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users.dashboard');
Route::get('perfil/{username}/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->name('users.profile');
Route::get('editar-perfil', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('users.edit-profile');
Route::patch('editar-perfil', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('users.update-profile');
Route::get('editar-password', [UserController::class, 'editPassword'])->middleware(['auth', 'verified'])->name('users.edit-password');
Route::patch('editar-password', [UserController::class, 'updatePassword'])->middleware(['auth', 'verified'])->name('users.update-password');
Route::get('desactivar-cuenta' , [UserController::class, 'delete'])->middleware(['auth', 'verified'])->name('users.delete');
Route::delete('desactivar-cuenta/{id}' , [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('users.destroy');

Route::get('dashboard/notas', [UserController::class, 'posts'])->middleware(['auth', 'verified'])->name('users.posts');
Route::get('dashboard/borrador/{id}' , [UserController::class, 'trashed'])->middleware(['auth', 'verified'])->name('users.trashed');
Route::get('dashboard/comentarios', [UserController::class, 'reviews'])->middleware(['auth', 'verified'])->name('users.reviews');
Route::get('dashboard/likes', [UserController::class, 'likes'])->middleware(['auth', 'verified'])->name('users.likes');

// rutas de las imagenes
Route::post('image/store', [ImageController::class, 'store'])->middleware(['auth', 'verified'])->name('users.store-image');
Route::get('image/{filename}/show', [ImageController::class, 'show'])->name('users.image');
Route::put('image/{filename}/update', [ImageController::class, 'update'])->middleware(['auth', 'verified'])->name('users.update-image');
Route::delete('image/{filename}/destroy', [ImageController::class, 'destroy'])->middleware(['auth', 'verified'])->name('users.destroy-image');

// Rutas de las notas
Route::get('notas/{user?}', [PostController::class, 'index'])->name('posts.index');
Route::get('notas/crear', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('posts.create');
Route::post('notas/crear', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('posts.store');
Route::get('notas/ver/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('notas/editar/{post}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts.edit');
Route::patch('notas/editar/{post}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts.update');
Route::delete('notas/borrar/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('posts.destroy');
Route::patch('notas/restaurar/{post}', [PostController::class, 'restore'])->middleware(['auth', 'verified'])->name('posts.restore');

// Rutas de los comentarios
Route::post('comentarios/crear/{post}', [ReviewController::class, 'store'])->middleware(['auth', 'verified'])->name('reviews.store');
Route::get('comentarios/editar/{post}/{review}', [ReviewController::class, 'edit'])->middleware(['auth', 'verified'])->name('reviews.edit');
Route::patch('comentarios/editar/{review}', [ReviewController::class, 'update'])->middleware(['auth', 'verified'])->name('reviews.update');
Route::delete('comentarios/borrar/{review}', [ReviewController::class, 'destroy'])->middleware(['auth', 'verified'])->name('reviews.destroy');


// Rutas de los likes
Route::post('likes/crear/{post}', [LikeController::class, 'store'])->middleware(['auth', 'verified'])->name('likes.store');
Route::delete('likes/borrar/{post}/{user}', [LikeController::class, 'destroy'])->middleware(['auth', 'verified'])->name('likes.destroy');