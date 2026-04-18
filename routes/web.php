<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

//landing page
Route::get('/', function () {
    return view('landing.landing');
});

Route::get('/profile', function () {
    return view('profile');
});

/* login and register */
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/process', [LoginController::class, 'process'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

// cashier
Route::get('/cashier/dashboard', function () {
    return view('cashier.cashierDashboard');
});

Route::get('/cashier/order', function () {
    return view('cashier.cashierOrder');
});

Route::get('/cashier/status', function () {
    return view('cashier.cashierStatus');
});


//admin
Route::get('/admin/dashboard', function () {
    return view('admin.adminDashboard');
});

Route::get('/admin/customers', function () {
    return view('admin.adminCustomers');
});

Route::get('/admin/employees', function () {
    return view('admin.adminEmployees');
});

Route::get('/admin/orders', function () {
    return view('admin.adminOrders');
});

Route::get('/admin/services', function () {
    return view('admin.adminServices');
});

//user
Route::get('/user/dashboard', function () {
    return view('user.userDashboard');
})->name('user.dashboard');

Route::get('/user/history', function () {
    return view('user.userHistory');
});

Route::get('/user/order', function () {
    return view('user.userOrder');
});


Route::get('/user/profile', function () {
    return view('user.userProfile');
});


