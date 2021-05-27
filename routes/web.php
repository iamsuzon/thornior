<?php

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

/*
 | 1st. User Route
 | 2nd. Admin Route
 | 3rd. Blogger Route
 */





//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

/* ---------------------------------------------------------------------------------------------- */
/* User Login , Registration , Password Reset */
Auth::routes();

/* User Email Verification */
Route::prefix('user')->group(function(){
    Route::get('/email/verify', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'mustVerify'])->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'emailVerified'])->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'sendVerifyEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

/* User Dashboard */
Route::prefix('user')->middleware(['auth:web','verified'])->group(function(){
    /* If User Not Approved */
    Route::get('/approve', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'notApprove'])->name('user.notapprove');

    /* Approving User */


    Route::middleware('isapproved')->group(function(){
        Route::get('/dashboard', [App\Http\Controllers\BloggerController::class, 'index'])->name('user.dashboard');
    });
});
/* ---------------------------------------------------------------------------------------------- */





/* ---------------------------------------------------------------------------------------------- */
/* Admin Login */
Route::get('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showForm'])->name('admin.login.show');
Route::post('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');

/* Admin Password Reset */
Route::prefix('admin')->group(function(){
    Route::get('/password/reset',[App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/email',[App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::post('/password/reset',[App\Http\Controllers\Auth\AdminResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('/password/reset/{token}',[App\Http\Controllers\Auth\AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
});

/* Admin Dashboard */
Route::prefix('admin')->namespace('AdminControllers')->middleware('auth:admin')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminControllers\AdminController::class, 'index'])->name('admin.dashboard');

    /* Logout */
    Route::post('/admin-logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'adminlogout'])->name('admin.logout');

    /* Blogger Management */
    Route::get('/blogger', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'index'])->name('admin.blogger.index');
    Route::get('/blogger/create', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'create'])->name('admin.blogger.create');
    Route::post('/blogger/create', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'sent'])->name('admin.blogger.sent');
    Route::get('/blogger/{id}', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'giveapproval'])->name('admin.blogger.account.giveapproval');
});

Route::get('/blogger/account/{token}', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'compare'])->name('admin.blogger.account.compare')->middleware('checkinvitetoken');
Route::post('/blogger/account/create', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'store'])->name('admin.blogger.account.store');

Route::get('/blogger/account/approval/{id}', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'waitapproval'])->name('admin.blogger.account.approval');
/* ---------------------------------------------------------------------------------------------- */





/* ---------------------------------------------------------------------------------------------- */
/* Blogger Login */
Route::get('/blogger-login', [App\Http\Controllers\Auth\BloggerLoginController::class, 'showForm'])->name('blogger.login.show');
Route::post('/blogger-login', [App\Http\Controllers\Auth\BloggerLoginController::class, 'login'])->name('blogger.login.submit');

/* Blogger Password Reset */
Route::prefix('blogger')->group(function(){
    Route::get('/password/reset',[App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('blogger.password.request');
    Route::post('/password/email',[App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('blogger.password.email');
    Route::post('/password/reset',[App\Http\Controllers\Auth\AdminResetPasswordController::class, 'reset'])->name('blogger.password.update');
    Route::get('/password/reset/{token}',[App\Http\Controllers\Auth\AdminResetPasswordController::class, 'showResetForm'])->name('blogger.password.reset');
});

/* Blogger Dashboard */
Route::prefix('blogger')->middleware(['auth:blogger'])->group(function(){
    /* If Blogger Not Approved */
    Route::get('/approve', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'notApprove'])->name('blogger.notapprove');

    Route::middleware('isapproved')->group(function(){
        /* Blog Creation Process */
        Route::match(['get','post'],'setup/blog/step-1', [App\Http\Controllers\BloggerControllers\BlogCreationController::class, 'step1'])->name('blogger.blog.create.step1');
        Route::match(['get','post'],'setup/blog/step-2', [App\Http\Controllers\BloggerControllers\BlogCreationController::class, 'step2'])->name('blogger.blog.create.step2');


        Route::get('/dashboard', [App\Http\Controllers\BloggerController::class, 'index'])->name('blogger.dashboard');
    });

    /* Logout */
    Route::post('/blogger-logout', [App\Http\Controllers\Auth\BloggerLoginController::class, 'bloggerlogout'])->name('blogger.logout');
});
/* ---------------------------------------------------------------------------------------------- */
