<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentBookController;
use App\Http\Controllers\DashboardController;

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
// search-and-filter
// Route::get('/search-and-filter', [HomeController::class, 'searchAndFilter'])->name('search');

Route::middleware('auth')->group(function() {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
    // category routes
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category')->middleware('admin');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store')->middleware('admin');
    Route::put('/admin/category/{slug}/edit', [CategoryController::class, 'update'])->name('category.update')->middleware('admin');
    Route::delete('/admin/category/{slug}/delete', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('admin');
    Route::get('/admin/category/deleted', [CategoryController::class, 'deleted'])->name('category.deleted')->middleware('admin');
    Route::get('/admin/category/{slug}/restore', [CategoryController::class, 'restore'])->name('category.restore')->middleware('admin');
    Route::delete('/admin/category/{slug}/permanently-delete', [CategoryController::class, 'permanentlyDelete'])->name('category.permanently-delete')->middleware('admin');
    // Book Routes
    Route::get('/admin/book-list', [BookController::class, 'index'])->name('book-list')->middleware('admin');
    Route::post('/admin/book-list', [BookController::class, 'store'])->name('book-list.store')->middleware('admin');
    Route::put('/admin/book-list/{slug}/edit', [BookController::class, 'update'])->name('book-list.update')->middleware('admin');
    Route::delete('/admin/book-list/{slug}/delete', [BookController::class, 'destroy'])->name('book-list.destroy')->middleware('admin');
    Route::get('/admin/book-list/deleted', [BookController::class, 'deleted'])->name('book-list.deleted')->middleware('admin');
    Route::get('/admin/book-list/{slug}/restore', [BookController::class, 'restore'])->name('book-list.restore')->middleware('admin');
    Route::delete('/admin/book-list/{slug}/permanently-delete', [BookController::class, 'permanentlyDelete'])->name('book-list.permanently-delete')->middleware('admin');

    // Users Routes
    Route::get('/admin/user-list', [UserController::class, 'index'])->name('user-list')->middleware('admin');
    Route::get('/admin/user-list/{slug}/detail', [UserController::class, 'detail'])->name('user-list.detail')->middleware('admin');
    Route::get('/admin/user-list/new-user', [UserController::class, 'newUser'])->name('user-list.new-user')->middleware('admin');
    Route::get('/admin/user-list/{slug}/approve', [UserController::class, 'approve'])->name('user-list.approve')->middleware('admin');
    Route::get('/admin/user-list/{slug}/remove', [UserController::class, 'remove'])->name('user-list.remove')->middleware('admin');
    Route::get('/admin/user-list/deleted', [UserController::class, 'deleted'])->name('user-list.deleted')->middleware('admin');
    Route::get('/admin/user-list/{slug}/restore', [UserController::class, 'restore'])->name('user-list.restore')->middleware('admin');
    Route::delete('/admin/user-list/{slug}/permanently-delete', [UserController::class, 'permanentlyDelete'])->name('user-list.permanently-delete')->middleware('admin');

    // Rent Book Routes
    Route::get('/admin/rent-log', [RentController::class, 'index'])->name('rent-log')->middleware('admin');
    Route::post('/admin/rent-log', [RentController::class, 'store'])->name('rent-log.store')->middleware('admin');
    Route::post('/admin/return-book', [RentController::class, 'returnBook'])->name('return-book')->middleware('admin');
    Route::get('/admin/rent-log/detail', [RentController::class, 'getRent'])->name('get-rent')->middleware('admin');
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// category routes





