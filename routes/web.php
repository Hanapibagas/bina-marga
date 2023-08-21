<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\TambahPenggunaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'getLogin'])->name('get.LoginHome');
Route::get('/auth/google', [GoogleController::class, 'getRedirectToGoogle'])->name('get.Auth.Google');
Route::get('/auth/google/callback', [GoogleController::class, 'getHandleGoogleCallback'])->name('google');

Auth::routes(['register' => false]);
Route::get('register', function () {
    return view('auth.404');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/tambah-pengguna', [TambahPenggunaController::class, 'getStorePengguna'])->name('get.Tambah.Pengguna');
