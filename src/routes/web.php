<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TargetWeightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/step1', [AuthController::class, 'storeStep1'])->name('register.step1');
});

Route::middleware('auth')->group(function () {
    Route::get('/register/step2', [AuthController::class, 'showStep2'])->name('register.step2');
    Route::post('/register/step2', [AuthController::class, 'storeStep2'])->name('register.step2.store');
    Route::get('/weight_logs', [AuthController::class, 'admin'])->name('admin');
});