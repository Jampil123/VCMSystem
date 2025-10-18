<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClampingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/fetch', [UserController::class, 'fetchUsers'])->name('users.fetch');


    // Clamping
    Route::get('/clampings', [ClampingController::class, 'index'])->name('clampings');
    Route::post('/clampings', [ClampingController::class, 'store']);
    Route::get('/clampings/receipt/{id}', [ClampingController::class, 'print'])->name('clampings.print'); 
    

    // Enforcer add clamping
    
    
    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payments', [PaymentController::class, 'store']);

});

Route::get('/verify/{id}', [ClampingController::class, 'verify'])->name('clampings.verify');

// Route::get('/users', function () {
//         return view('users'); 
//     })->name('users');

Route::get('/enforcers', function () {
        return view('dashboards.overview'); 
    })->name('overview');

Route::get('/add-clamping', [ClampingController::class, 'create'])->name('add.clamping');
