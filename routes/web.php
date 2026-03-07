<?php

use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/home', function () {
    return view('home');
});