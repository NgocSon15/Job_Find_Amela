<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CustomerController;

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
Route::post('/user-profile' ,[HomeController::class, 'updateProfile'])->name('frontend.user-profile.update');

Route::post('/apply-now' ,[JobController::class, 'ApplyNow'])->name('frontend.apply');
Route::post('/user-profile/exp' ,[HomeController::class, 'addExp'])->name('frontend.exp');
Route::get('/user-profile/{id}/detail-exp', [HomeController::class, 'getExp'])->name('frontend.getExp');
Route::post('/user-profile/{id}/detail-exp', [HomeController::class, 'updateExp'])->name('frontend.updateExp');
Route::get('/user-profile/{id}/delete-exp', [HomeController::class, 'destroyExp'])->name('frontend.deleteExp');

Route::get('/list-job-apply', [HomeController::class, 'listJobApply'])->name('frontend.listJobApply');

Route::prefix('job')->group(function() {
    Route::get('/', [JobController::class, 'feCreate'])->name('frontend.job.create')->middleware('checkLogin');
    Route::post('/', [JobController::class, 'store'])->name('frontend.job.store')->middleware('checkLogin');
    Route::get('/edit/{id}', [JobController::class, 'feEdit'])->name('frontend.job.edit')->middleware('checkLogin');
    Route::post('/edit/{id}' ,[JobController::class, 'update'])->name('frontend.job.update')->middleware('checkLogin');
    Route::get('/delete/{id}' ,[JobController::class, 'destroy'])->name('frontend.job.destroy')->middleware('checkLogin');
    Route::get('/{id}/apply', [JobController::class, 'showApply'])->name('frontend.job.showApply')->middleware('checkLogin');
    Route::get('/apply/{id}', [JobController::class, 'applyDetail'])->name('frontend.apply.show')->middleware('checkLogin');
});

Route::prefix('company')->group(function() {
    Route::get('/', [CompanyController::class, 'feIndex'])->name('frontend.company.index');
    Route::get('/show/{id}', [CompanyController::class, 'feShow'])->name('frontend.company.show');
    Route::post('/filter', [CompanyController::class, 'filter'])->name('frontend.company.filter');
    Route::get('/{id}/job', [CompanyController::class, 'getJobList'])->name('frontend.company.joblist');
    Route::post('/edit/{id}', [CompanyController::class, 'feUpdate'])->name('frontend.company.update');
    Route::get('/lockJob', [CompanyController::class, 'lockJob'])->name('frontend.company.lockJob');
    Route::get('/unlockJob', [CompanyController::class, 'unlockJob'])->name('frontend.company.unlockJob');
    Route::get('/suggestToAdmin', [CompanyController::class, 'suggestToAdmin'])->name('frontend.company.sentSuggest');
    Route::get('/delSuggestToAdmin', [CompanyController::class, 'delSuggestToAdmin'])->name('frontend.company.delSentSuggest');
    Route::get('/list-candidates', [CompanyController::class, 'listCandidates'])->name('list.candidates');
    Route::get('/show-candidate', [CompanyController::class, 'showCandidate'])->name('show.candidate');
});

Route::get('customer/{id}/cv', [CustomerController::class, 'downloadCV'])->name('customer.cv.download');

Route::group(['prefix' => 'customer', 'middleware' => ['checkLogin', 'checkCustomer']],function() {
    Route::get('/list-job-followed', [CustomerController::class, 'listJobFollowed'])->name('customer.list.followed');
    Route::get('/follow', [CustomerController::class, 'followJob'])->name('customer.follow.job');
    Route::get('/unfollow', [CustomerController::class, 'unFollowJob'])->name('customer.unFollow.job');
    Route::get('/block-company', [CustomerController::class, 'blockCompany'])->name('customer.block.company');
    Route::get('/unblock-company', [CustomerController::class, 'unblockCompany'])->name('customer.unblock.company');
    Route::get('/list-blocked', [CustomerController::class, 'listBlocked'])->name('customer.list.block');
    Route::get('/search-company', [CustomerController::class, 'searchCompany'])->name('customer.search.company');
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
        Route::get('/list-suggestion', [JobController::class, 'showListSuggest'])->name('admin.list.suggest');
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
        Route::post('suggest', [CompanyController::class, 'suggest'])->name('admin.company.suggest');
    });

    Route::prefix('config')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('admin.config.index');
        Route::get('/update-footer', [ConfigController::class, 'updateFooter'])->name('admin.config.update.footer');
        Route::post('/update-banner', [ConfigController::class, 'updateBanner'])->name('admin.config.update.banner');
    });
});

Route::get('/register', [RegisterController::class, 'showRegisterCustomer']);
Route::get('/active/{email?}/{codeConfirm?}', [RegisterController::class, 'active'])->name('active');
Route::post('/register', [RegisterController::class, 'registerCustomer'])->name('register-customer');
Route::get('/register/company', [RegisterController::class, 'showRegisterCompany'])->middleware(('checkLogged'));
Route::post('/register/company', [RegisterController::class, 'registerCompany'])->name('register-company');
Route::get('/login', [LoginController::class, 'showLogin'])->name('show-login')->middleware('checkLogged');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/forgot-password', [LoginController::class, 'showForgotPass'])->name('forgot-password');
Route::post('/reset-password', [LoginController::class, 'resetPass'])->name('reset-password');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

