<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

//landing page
Route::get('/', function () {
    return view('landing.landing');
});



/* login and register */
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/process', [LoginController::class, 'process'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

// staff / teknisi
Route::middleware(['auth'])->prefix('staff')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/tasks', [StaffController::class, 'tasks'])->name('staff.tasks');
    Route::put('/update-status/{pesanan}', [StaffController::class, 'updateStatus'])->name('staff.updateStatus');
    Route::get('/history', [StaffController::class, 'history'])->name('staff.history');
});


//admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Services
    Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
    Route::post('/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::put('/services/{layanan}', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::delete('/services/{layanan}', [AdminController::class, 'deleteService'])->name('admin.services.destroy');

    // Schedules
    Route::get('/schedules', [AdminController::class, 'schedules'])->name('admin.schedules');
    Route::post('/schedules', [AdminController::class, 'storeSchedule'])->name('admin.schedules.store');
    Route::put('/schedules/{jadwal}', [AdminController::class, 'updateSchedule'])->name('admin.schedules.update');

    // Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::put('/orders/{pesanan}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update');
    Route::delete('/orders/{pesanan}', [AdminController::class, 'deleteOrder'])->name('admin.orders.destroy');

    // Users
    Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::get('/employees', [AdminController::class, 'employees'])->name('admin.employees');
    Route::post('/employees', [AdminController::class, 'storeEmployee'])->name('admin.employees.store');
    Route::put('/users/{user}/toggle', [AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');
});

//user
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/order', [UserController::class, 'order'])->name('user.order');
    Route::post('/order/store', [UserController::class, 'storeOrder'])->name('user.order.store');
    Route::get('/history', [UserController::class, 'history'])->name('user.history');
    Route::get('/profile', function () {
        return view('user.userProfile');
    })->name('user.profile');
});


