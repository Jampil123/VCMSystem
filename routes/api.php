<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClampingController;
use App\Http\Controllers\PaymentController;

Route::post('/clampings', [ClampingController::class, 'store']); 
Route::get('/clampings', [ClampingController::class, 'index'])->name('clampings');

Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments', [PaymentController::class, 'index'])->name('payments');