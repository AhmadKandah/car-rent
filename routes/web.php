<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Route;
//السلام عليكم ورحمة الله 
Route::get('/test', [CarController::class, 'test']);
Route::get('/test2', [CarController::class, 'test2'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/car',[CarController::class,'index'])->name('car.index');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('templet.home');
//     })->name('dashboard');
//     Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store']);
//     Route::get('/dashboard/cars', [CarController::class, 'index'])->name('cars.index');
//     Route::post('/cars/{car}/reserve', [CarController::class, 'reserve'])->name('cars.reserve');
// });

Route::middleware([])->group(function () {
    Route::resource('cars', CarController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('reservations', ReservationController::class)->only(['edit', 'update', 'destroy']);
    Route::resource('payments', PaymentController::class);
    Route::resource('maintenance', MaintenanceController::class);
});

require __DIR__ . '/auth.php';
