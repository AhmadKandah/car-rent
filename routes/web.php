<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//السلام عليكم ورحمة الله 
Route::get('/test', [CarController::class, 'test']);
Route::get('/test2', [CarController::class, 'test2'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [CarController::class, 'Home'])->name('home');
// Route::get('/car',action: [CarController::class,'index'])->name('car.index');

Route::get('/create',function(){return view('templet.car.create');});


// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('templet.home');
//     })->name('dashboard');
//     Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store']);
//     Route::get('/dashboard/cars', [CarController::class, 'index'])->name('cars.index');
//     Route::post('/cars/{car}/reserve', [CarController::class, 'reserve'])->name('cars.reserve');
// });

Route::middleware([])->group(function () {
    Route::resource('car', CarController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('reservations', ReservationController::class)->only(['edit', 'update', 'destroy']);
    Route::resource('payments', PaymentController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::resource('users', UserController::class);
});


require __DIR__ . '/auth.php';
