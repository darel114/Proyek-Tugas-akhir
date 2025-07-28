<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

// Publicly accessible routes for general users
Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('/home', [DashboardController::class, 'home'])->name('user.home');
Route::get('/kategori/{slug}', [DashboardController::class, 'kategori'])->name('user.kategori');
Route::get('/konten/{slug}', [DashboardController::class, 'konten'])->name('user.konten.detail');
Route::get('/aboutus', [DashboardController::class, 'about'])->name('user.about');

// Authentication related routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin panel routes (requires 'admin' role)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/kategori', CategoryController::class)->names('kategori');
    Route::resource('/subkategori', SubCategoryController::class)->names('subkategori');
    Route::resource('/konten', ContentController::class)->names('konten');
});

// User specific authenticated routes (requires 'user' role)
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // The 'pesan' route remains here to require authentication for posting bulletins
    Route::get('/pesan', [DashboardController::class, 'message'])->name('message');
});