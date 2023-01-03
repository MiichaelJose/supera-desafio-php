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
    Route::post('/user/cadastrar', 'store')->name('user.store');
    Route::get('/user/lista', 'index')->name('user.index');
    Route::get('/user/listar/{id}', 'show')->name('user.show');
    Route::get('/user', 'view')->name('user.view');
    Route::delete('/user/deletar/{id}', 'destroy')->name('user.destroy');
});

Route::controller(VehicleController::class)->group(function () {
    Route::get('/vehicle/lista', 'index')->name('vehicle.index');
    Route::post('/vehicle/cadastrar', 'store')->name('vehicle.store');
    Route::get('/vehicle/listar/{id}', 'show')->name('vehicle.show');
    Route::put('/vehicle/alterar/{id}', 'update')->name('vehicle.update');
    Route::delete('/vehicle/deletar/{id}', 'destroy')->name('vehicle.destroy');
    Route::get('/vehicle', 'view')->name('vehicle.view');
});

Route::controller(MaintenanceController::class)->group(function () {
    Route::put('/maintenance/alterar/{id}', 'update')->name('maintenance.update');
    Route::get('/maintenance/lista', 'index')->name('maintenance.index');
    Route::get('/maintenance/listar/{id}', 'show')->name('maintenance.show');
    Route::get('/maintenance', 'view')->name('maintenance.view');
    Route::delete('/maintenance/deletar/{id}', 'destroy')->name('maintenance.destroy');
    Route::post('/maintenance/cadastrar', 'store')->name('maintenance.store');
});