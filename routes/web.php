<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckCustomerRole;
use App\Http\Middleware\CheckEmployeeRole;
use App\Http\Middleware\CheckManagerRole;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'registerNewUser'])->name('registerNewUser');
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(CheckCustomerRole::class)->prefix('customer')->group(function() {
    Route::get('/account', [CustomerController::class, 'viewAccount'])->name('viewCustomerAccount');
    Route::patch('/account', [CustomerController::class, 'updateAccount'])->name('updateCustomerAccount');

    Route::get('/cart', [CustomerController::class, 'viewCart'])->name('viewCart');
});

Route::middleware(CheckEmployeeRole::class)->prefix('/employee')->group(function() {
    Route::get('/account', [EmployeeController::class, 'viewAccount'])->name('viewEmployeeAccount');
    Route::patch('/account', [EmployeeController::class, 'updateAccount'])->name('updateEmployeeAccount');
});

Route::middleware(CheckManagerRole::class)->prefix('/manager')->group(function() {
    Route::get('/account', [ManagerController::class, 'viewAccount'])->name('viewManagerAccount');
    Route::patch('/account', [ManagerController::class, 'updateAccount'])->name('updateManagerAccount');
    
    Route::get('/add_product', [ManagerController::class, 'viewAddProduct'])->name('viewAddProduct');
    Route::post('/add_product', [ManagerController::class, 'addNewProduct'])->name('addNewProduct');
    
    Route::get('/employees', [ManagerController::class, 'viewManageEmployees'])->name('viewManageEmployees');
    Route::post('/employees', [ManagerController::class, 'addNewEmployee'])->name('addNewEmployee');
    Route::delete('employees', [ManagerController::class, 'deleteEmployee'])-> name('deleteEmployee');
});