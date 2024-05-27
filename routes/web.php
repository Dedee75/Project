<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StaffController;
use App\Models\Staff;

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

// Route::get('/admin/login',[CustomerController::class,'login'])->name('customerLogin');
    Route::get('/admin/login',[AdminController::class,'login'])->name('adminLogin');
    Route::post('/admin/login/process',[LoginController::class,'login'])->name('adminLoginProcess');



Route::middleware(['admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('adminDashboard');

    Route::get('/admin/list',[AdminController::class,'list'])->name('adminList');
    Route::get('admin/customerlist',[StaffController::class,'customerlist'])->name('customerList');
    Route::get('/admin/customer/delete/{id}',[StaffController::class,'customerdelete'])->name('customerdelete');
    Route::get('/admin/stafflist',[StaffController::class,'stafflist'])->name('staffList');
    Route::get('/admin/register',[StaffController::class,'register']);
    Route::post('/admin/register/process',[StaffController::class,'process'])->name('admin-register-process');

    Route::get('/admin/staff/delete/{id}',[StaffController::class,'staffdelete'])->name('staffdelete');
    Route::get('/admin/staff/edit/{id}',[StaffController::class,'staffedit'])->name('staffedit');
    Route::patch('/admin/register/update/process',[StaffController::class,'updateprocess'])->name('adminRegisterUpdateProcess');

    Route::get('/admin/item/register',[StaffController::class,'itemregister'])->name('itemRegister');

});

Route::middleware(['customer'])->group(function(){

});
