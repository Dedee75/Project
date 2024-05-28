<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SupplierController;
use App\Models\Staff;
use App\Models\Supplier;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home',[CustomerController::class,'home'])->name('homepage');
//Customer Start
Route::get('/customer/login',[CustomerController::class,'login'])->name('customeLogin');
Route::post('/customer/login/process',[LoginController::class,'login'])->name('customerLoginProcess');
Route::get('/customer/register',[CustomerController::class,'register']);
Route::post('/customer/register/process',[CustomerController::class,'process'])->name('customer-register-process');
// Route::get('/admin/login',[CustomerController::class,'login'])->name('customerLogin');
//Customer End
//admin Start

    Route::get('/admin/login',[AdminController::class,'login'])->name('adminLogin');
    Route::post('/admin/login/process',[LoginController::class,'login'])->name('adminLoginProcess');
//admin End


Route::middleware(['admin'])->group(function(){
    //admin Dashboard start
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('adminDashboard');
    //admin Dasbhoard End
    //admin List start
    Route::get('/admin/list',[AdminController::class,'list'])->name('adminList');
    Route::get('/admin/stafflist',[StaffController::class,'stafflist'])->name('staffList');
    Route::get('/admin/register',[StaffController::class,'register']);
    Route::post('/admin/register/process',[StaffController::class,'process'])->name('admin-register-process');
    Route::get('/admin/staff/edit/{id}',[StaffController::class,'staffedit'])->name('staffedit');
    Route::patch('/admin/register/update/process',[StaffController::class,'updateprocess'])->name('adminRegisterUpdateProcess');
    Route::get('/admin/staff/delete/{id}',[StaffController::class,'staffdelete'])->name('staffdelete');

    //admin List end

    //customer list start
        Route::get('/admin/customerlist',[StaffController::class,'customerlist'])->name('customerList');
        Route::get('/admin/customer/delete/{id}',[StaffController::class,'customerdelete'])->name('customerdelete');
    //customer list end

    //subcategory start
        Route::get('/admin/subcategorylist',[SubcategoryController::class,'subcategorylist'])->name('subcategoryList');
        Route::get('/admin/subcategory/register',[SubcategoryController::class,'subcategoryregister'])->name('subcategoryRegister');
        Route::post('/admin/subcategory/register/process',[SubcategoryController::class,'subcategoryregisterprocess'])->name('subcategoryRegisterProcess');
        Route::get('/admin/subcategory/edit/{id}',[SubcategoryController::class,'subcategoryedit'])->name('subcategoryedit');
        Route::patch('/admin/subcategory/register/update/process',[SubcategoryController::class,'updateprocess'])->name('subcategoryRegisterUpdateProcess');
        Route::get('/admin/subcategory/delete/{id}',[SubcategoryController::class,'subcategorydelete'])->name('subcategorydelete');

    //subcategory end

    //brand start

    //brand end

    //supplier start
        Route::get('/admin/supplier/list',[SupplierController::class,'supplierlist'])->name('supplierList');
        Route::get('/admin/supplier/register',[SupplierController::class,'supplierregister'])->name('supplierRegister');
        Route::post('/admin/supplier/register/process',[SupplierController::class,'supplierregisterprocess'])->name('supplierRegisterProcess');
        Route::get('/admin/supplier/edit/{id}',[SupplierController::class,'supplieredit'])->name('supplieredit');
        Route::patch('/admin/supplier/register/update/process',[SupplierController::class,'updateprocess'])->name('supplierRegisterUpdateProcess');
        Route::get('/admin/supplier/delete/{id}',[SupplierController::class,'supplierdelete'])->name('subcategorydelete');
        Route::post('/admin/supplier/search',[SupplierController::class,'search'])->name('supplierSearch');
    //supplier end

    //Report Start

        //Sale Report start

        //sale Report end

        //Purchase report  start

        //purchase report end
    //Report End



    // Route::get('/admin/item/register',[StaffController::class,'itemregister'])->name('itemRegister');


});

Route::middleware(['customer'])->group(function(){

});
