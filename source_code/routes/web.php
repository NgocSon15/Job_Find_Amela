<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;

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



Route::get('/job_list', [HomeController::class, 'getListJob'])->name('job_list');
Route::get('/job_list/filter', [HomeController::class, 'filterJob'])->name('filter');
Route::get('/job_detail/{id}', [HomeController::class, 'getDetailJob'])->name('detail');

Route::get('/', [HomeController::class, 'getHome'])->name('frontend.home');
Route::get('/search', [HomeController::class, 'homeSearch'])->name('frontend.search');

Route::get('/user-profile', [HomeController::class, 'getProfile'])->name('frontend.user-profile');
Route::post('/user-profile' ,[HomeController::class, 'updateProfileUser'])->name('frontend.user-profile.update');


Route::prefix('job')->group(function() {
    Route::get('/', [JobController::class, 'feCreate'])->name('frontend.job.create')->middleware('checkLogin');
    Route::post('/', [JobController::class, 'store'])->name('frontend.job.store')->middleware('checkLogin');
    Route::get('/edit/{id}', [JobController::class, 'edit'])->name('frontend.job.edit')->middleware('checkLogin');
    Route::post('/edit/{id}' ,[JobController::class, 'update'])->name('frontend.job.update')->middleware('checkLogin');
    Route::get('/delete/{id}' ,[JobController::class, 'destroy'])->name('frontend.job.destroy')->middleware('checkLogin');
});

Route::prefix('company')->group(function() {
    Route::get('/', [CompanyController::class, 'feIndex'])->name('frontend.company.index');
    Route::get('/show/{id}', [CompanyController::class, 'feShow'])->name('frontend.company.show');
    Route::post('/filter', [CompanyController::class, 'filter'])->name('frontend.company.filter');
    Route::get('/{id}/job', [CompanyController::class, 'getJobList'])->name('frontend.company.joblist');
    Route::post('/edit/{id}', [CompanyController::class, 'feUpdate'])->name('frontend.company.update');
});

Route::prefix('customer')->group(function() {

});


Route::prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::prefix('job')->group(function() {
        Route::get('/', [JobController::class, 'index'])->name('admin.job.index');
        Route::get('/active', [JobController::class, 'activeJob'])->name('admin.job.active');
        Route::get('/lock', [JobController::class, 'lockJob'])->name('admin.job.lock');
        Route::get('/suggest', [JobController::class, 'suggestJob'])->name('admin.job.suggest');
        Route::get('/not-suggest', [JobController::class, 'notSuggestJob'])->name('admin.job.not_suggest');
        Route::get('/create', [JobController::class, 'create'])->name('admin.job.create');
        Route::post('/create', [JobController::class, 'store'])->name('admin.job.store');
        Route::get('show/{id}', [JobController::class, 'show'])->name('admin.job.show');
        Route::get('edit/{id}', [JobController::class, 'edit'])->name('admin.job.edit');
        Route::post('edit/{id}', [JobController::class, 'update'])->name('admin.job.update');
        Route::get('delete/{id}', [JobController::class, 'delete'])->name('admin.job.delete');
        Route::post('delete/{id}', [JobController::class, 'destroy'])->name('admin.job.destroy');
        Route::get('/search', [JobController::class, 'search'])->name('admin.job.search');
    });

    Route::prefix('company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('admin.company.index');
        Route::get('/create', [CompanyController::class, 'create'])->name('admin.company.create');
        Route::post('/create', [CompanyController::class, 'store'])->name('admin.company.store');
        Route::get('show/{id}', [CompanyController::class, 'show'])->name('admin.company.show');
        Route::get('edit/{id}', [CompanyController::class, 'edit'])->name('admin.company.edit');
        Route::post('edit/{id}', [CompanyController::class, 'update'])->name('admin.company.update');
        Route::get('delete/{id}', [CompanyController::class, 'delete'])->name('admin.company.delete');
        Route::post('delete/{id}', [CompanyController::class, 'destroy'])->name('admin.company.destroy');
        Route::get('verify/{id}', [CompanyController::class, 'verify'])->name('admin.company.verify');
        Route::get('lock/{id}', [CompanyController::class, 'lock'])->name('admin.company.lock');
        Route::get('unlock/{id}', [CompanyController::class, 'unlock'])->name('admin.company.unlock');
        Route::get('/lockJob', [CompanyController::class, 'lockJob'])->name('admin.company.lockJob');
        Route::get('/unlockJob', [CompanyController::class, 'unlockJob'])->name('admin.company.unlockJob');
        Route::post('suggest', [CompanyController::class, 'suggest'])->name('admin.company.suggest');
    });
});

Route::get('/register', [RegisterController::class, 'showRegisterCustomer']);
Route::get('/active/{email?}/{codeConfirm?}', [RegisterController::class, 'active'])->name('active');
Route::post('/register', [RegisterController::class, 'registerCustomer'])->name('register-customer');
Route::get('/register/company', [RegisterController::class, 'showRegisterCompany']);
Route::post('/register/company', [RegisterController::class, 'registerCompany'])->name('register-company');
Route::get('/login', [LoginController::class, 'showLogin'])->name('show-login')->middleware('checkLogged');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/forgot-password', [LoginController::class, 'showForgotPass'])->name('forgot-password');
Route::post('/reset-password', [LoginController::class, 'resetPass'])->name('reset-password');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

