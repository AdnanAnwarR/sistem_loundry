<?php

use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return view('profile');
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