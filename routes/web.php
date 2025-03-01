<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [CarController::class, 'test'])->name('cars.index');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store']);
    Route::get('/dashboard/cars', [CarController::class, 'index'])->name('cars.index');
    Route::post('/cars/{car}/reserve', [CarController::class, 'reserve'])->name('cars.reserve');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('cars', CarController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('reservations', ReservationController::class)->only(['edit', 'update', 'destroy']);
    Route::resource('payments', PaymentController::class);
    Route::resource('maintenance', MaintenanceController::class);
});

require __DIR__ . '/auth.php';
