<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


// Create additional Routes below

Route::get('/login', [AuthController::class,'create'])->name('login');
Route::post('/login', [AuthController::class,'store'])->name('login.store');

Route::get('/clients/add', [ClientController::class,'create'])->name('clients.create')->middleware('auth');
Route::post('/clients', [ClientController::class,'store'])->name('clients.store')->middleware('auth');

Route::post('/logout', [AuthController::class,'logout'])->name('logout');
