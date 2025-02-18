<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TargetWeightController;
use App\Http\Controllers\WeightLogController;


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
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/register/step2', [AuthController::class, 'showStep2'])->name('register.step2');
    Route::post('/register/step2', [AuthController::class, 'storeStep2'])->name('register.step2.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/weight_logs', [AuthController::class, 'admin'])->name('admin');
    Route::post('/weight_logs', [WeightLogController::class, 'store'])->name('weight_log.store');
    Route::get('/weight_logs/search', [WeightLogController::class, 'search'])->name('weight_logs.search');

    Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'show'])->name('weight_log.show');
    Route::post('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update'])->name('weight_logs.update');
    Route::post('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'destroy'])->name('weight_logs.delete');

    Route::get('/weight_setting', [TargetWeightController::class, 'edit'])->name('goal_setting');
    Route::post('/weight_setting', [TargetWeightController::class, 'update'])->name('goal_setting.update');
});