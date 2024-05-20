<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home',[CustomerController::class,'home'])->name('homepage');
Route::get('/customer/login',[CustomerController::class,'login'])->name('customeLogin');
Route::post('/customer/login/process',[LoginController::class,'login'])->name('customerLoginProcess');
Route::get('/customer/register',[CustomerController::class,'register']);
Route::post('/customer/register/process',[CustomerController::class,'process'])->name('customer-register-process');
// Route::get('/customer/dashboard',[CustomerController::class,'dashboard'])->name('customerDashboard');

Route::middleware(['admin'])->group(function(){
    Route::get('/admin/register',[AdminController::class,'register']);
    Route::post('/admin/register/process',[AdminController::class,'process'])->name('admin-register-process');
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('adminDashboard');
});

Route::middleware(['customer'])->group(function(){

});
