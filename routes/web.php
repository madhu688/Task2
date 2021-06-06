<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);


Route::get('/dashboard',[DashboardController::class,'userCount'])->name('dashboard');


/**  Route for Blog Cruds   **/
Route::get('/add-blog',[BlogController::class,'addPost']);
Route::post('/save-blog',[BlogController::class,'savePost'])->name('blog.save');
Route::get('/all-blog',[BlogController::class,'getPost'])->name('blog.all-blog');
Route::get('/edit-blog/{id}',[BlogController::class,'editPost']);
Route::get('/delete-blog/{id}',[BlogController::class,'deletePost']);
Route::post('/update-blog',[BlogController::class,'updatePost'])->name('blog.update');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');

