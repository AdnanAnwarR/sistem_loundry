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

// ==========================================
// 1. ROUTE STAFF (Mantan Cashier)
// ==========================================
// Menggunakan middleware 'auth' agar wajib login, dan 'role:staff' agar hanya staff yang bisa akses
Route::middleware(['auth', 'role:staff'])->group(function () {
    
    // Memberikan nama rute 'staff.dashboard' agar sesuai dengan redirect di LoginController
    Route::get('/staff/dashboard', function () {
        return view('cashier.cashierDashboard'); // View tetap menggunakan cashierDashboard
    })->name('staff.dashboard');

    Route::get('/staff/order', function () {
        return view('cashier.cashierOrder');
    });

    Route::get('/staff/status', function () {
        return view('cashier.cashierStatus');
    });

});


// ==========================================
// 2. ROUTE ADMIN
// ==========================================
// Menggunakan middleware 'auth' agar wajib login, dan 'role:admin' agar hanya admin yang bisa akses
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // Memberikan nama rute 'admin.dashboard' agar sesuai dengan redirect di LoginController
    Route::get('/admin/dashboard', function () {
        return view('admin.adminDashboard');
    })->name('admin.dashboard');

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

});


// ==========================================
// 3. ROUTE USER / PELANGGAN
// ==========================================
// Menggunakan middleware 'auth' agar wajib login, dan 'role:pelanggan' agar hanya pelanggan yang bisa akses
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    
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

});
