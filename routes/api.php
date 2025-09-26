<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClampingController;

Route::post('/clampings', [ClampingController::class, 'store']); 
Route::get('/clampings', [ClampingController::class, 'index'])->name('clampings');