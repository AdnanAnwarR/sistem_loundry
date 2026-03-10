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

