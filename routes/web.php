<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjalananController;
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

Route::get('/dashboard', [PerjalananController::class, 'index'])->name('dashboard');

Route::get('/input', [PerjalananController::class, 'showInputForm']);

Route::post('/inputData', [PerjalananController::class, 'inputData']);

Route::get('/register', [UserController::class, 'registration']);

Route::post('/registerData', [UserController::class, 'register']);

Route::get('/', [UserController::class, 'login']);

Route::post('/postlogin', [UserController::class, 'postlogin']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/cariPerjalanan', [PerjalananController::class, 'search']);

Route::get('/delete/{id}', [PerjalananController::class, 'delete']);

Route::get('/edit/{id}', [PerjalananController::class, 'edit']);

Route::post('/update/{id}', [PerjalananController::class, 'update']);