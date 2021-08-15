<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisterController::class, 'showRegisterCustomer']);
Route::post('/register', [RegisterController::class, 'registerCustomer'])->name('register-customer');
Route::get('/register/company', [RegisterController::class, 'showRegisterCompany']);
Route::post('/register/company', [RegisterController::class, 'registerCompany'])->name('register-company');
Route::get('/login', [LoginController::class, 'showLogin'])->name('show-login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/forgot-password', [LoginController::class, 'showForgotPass'])->name('forgot-password');
Route::post('/reset-password', [LoginController::class, 'resetPass'])->name('reset-password');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');