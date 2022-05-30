<?php

use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\DashboardController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Start

Route::group(['prefix'=>'/','middleware'=>['auth','admin']],function(){

Route::get('/', function () {

return view('admin.pages.dashboard.dash');

})->name('admin.dashboard');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

});
