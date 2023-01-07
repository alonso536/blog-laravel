<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::view('/', 'home')->name('home');

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

Route::get('dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::view('notas', 'posts')->name('posts');
