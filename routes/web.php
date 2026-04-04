<?php

use Illuminate\Support\Facades\Route;

//landing page
Route::get('/', function () {
    return view('landing.landing');
});

Route::get('/profile', function () {
    return view('profile');
});

/* login and register */
Route::get('/login',function(){
    return view('form.login');
});

Route::get('/register',function(){
    return view('form.register');
});

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
});

Route::get('/user/history', function () {
    return view('user.userHistory');
});

Route::get('/user/order', function () {
    return view('user.userOrder');
});


Route::get('/user/profile', function () {
    return view('user.userProfile');
});


