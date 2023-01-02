<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Singin\SinginController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Vehicle\VehicleController;
use App\Http\Controllers\Maintenance\MaintenanceController;

Route::controller(SinginController::class)->group(function () {
    Route::redirect('/', '/login');
    Route::get('/login', 'show');
    Route::post('/login', 'singin')->name('singin');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'show')->name('home');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/user/post', 'store')->name('user.store');
    Route::get('/users', 'index')->name('user.index');
    Route::get('/user/{id}', 'show')->name('user.show');
    Route::get('/user', 'view')->name('user.view');
    Route::delete('/user/{id}', 'destroy')->name('user.destroy');
});

Route::controller(VehicleController::class)->group(function () {
    //Route::post('/vehicle/post', 'store')->name('vehicle.store');
    Route::get('/vehicle', 'index')->name('vehicle.index');
    Route::get('/vehicle/{id}', 'show')->name('vehicle.show');
});

Route::controller(MaintenanceController::class)->group(function () {
    Route::put('/maintenance-update/{id}', 'update')->name('maintenance.alterar');
    Route::get('/maintenance-lists', 'index')->name('maintenance.index');
    Route::get('/maintenance-list/{id}', 'show')->name('maintenance.show');
    Route::get('/maintenance-view', 'view')->name('maintenance.view');
    Route::delete('/maintenance-delete/{id}', 'destroy')->name('maintenance.destroy');
    Route::post('/maintenance-create', 'store')->name('maintenance.store');
});

// Route::put('/maintenance/{id}', [MaintenanceController::class, 'update'])->name('maintenance.alterar');

// Route::get('/maintenance/list', [MaintenanceController::class, 'index'])->name('maintenance.index');
// //Route::get('/maintenance/{id}', 'show')->name('maintenance.show');
// Route::get('/maintenance', [MaintenanceController::class, 'view'])->name('maintenance.view');
// // Route::get('/maintenance/{id}', 'show')->name('maintenance.show');
// Route::delete('/maintenance/{id}', [MaintenanceController::class, 'destroy'])->name('maintenance.destroy');
// Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('maintenance.store');