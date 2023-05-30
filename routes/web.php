<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentController;

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

// Auth routes

// route group guest
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registeration']);
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
    // category routes
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category')->middleware('admin');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store')->middleware('admin');
    // edit category
    Route::put('/admin/category/{slug}/edit', [CategoryController::class, 'update'])->name('category.update')->middleware('admin');
    Route::get('/admin/book-list', [BookController::class, 'index'])->name('book-list')->middleware('admin');
    Route::get('/admin/rent-log', [RentController::class, 'index'])->name('rent-log')->middleware('admin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// category routes





