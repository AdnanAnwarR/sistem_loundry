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

