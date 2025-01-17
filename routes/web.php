<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
});

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Subpage routes
Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::get('/settings', function () {
    return view('settings');
})->name('settings')->middleware('auth');

Route::get('/reports', function () {
    return view('reports');
})->name('reports')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
