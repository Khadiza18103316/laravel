<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Start
Route::group(['prefix'=>'/'],function(){

//Admin Registation & Login
Route::get('/admin/register',[AdminLoginController::class,'register'])->name('admin.register');
Route::post('/admin/register/post',[AdminLoginController::class,'registerPost'])->name('admin.register.post');
Route::get('/admin/login',[AdminLoginController::class,'login'])->name('admin.login');
Route::post('/admin/do/login',[AdminLoginController::class,'doLogin'])->name('admin.do.login');

Route::group(['middleware'=>['auth','admin']],function (){

Route::get('/', function () {

return view('admin.pages.dashboard.dash');

})->name('admin.dashboard');

//Admin Logout
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');

//Admin Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});
});