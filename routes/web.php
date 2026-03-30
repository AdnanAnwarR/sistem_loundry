<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.landing');
});

Route::get('/profile', function () {
    return view('profile');
});


Route::get('/login',function(){
    return view('form.login');
});

Route::get('/register',function(){
    return view('form.register');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/createOrder', function () {
    return view('createOrder');
});

Route::get('/customerDashboard', function () {
    return view('customerDashboard');
});

Route::get('/adminDashboard', function () {
    return view('adminDashboard');
});

Route::get('/adminOrders', function () {
    return view('adminorders');
});

Route::get('/adminService', function () {
    return view('adminService');
});

Route::get('/adminEmployees', function () {
    return view('adminEmployees');
});

Route::get('/adminEmployeeDirectory', function () {
    return view('adminEmployeeDirectory');
});

Route::get('/adminReportsAnalytics', function () {
    return view('adminReportsAnalytics');
});

Route::get('/adminCustomerOverview', function () {
    return view('adminCustomerOverview');
});

Route::get('/adminRoleManagement', function () {
    return view('adminRoleManagement');
});