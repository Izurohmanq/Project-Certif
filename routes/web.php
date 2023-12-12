<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['is_admin', 'verified'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/dashboard/getUser', [DashboardController::class, 'getUser'])->name('dashboard.getUser');
  
  Route::get('/shoes', [ShoeController::class, 'index'])->name('shoes');
  Route::get('/shoes/create', [ShoeController::class, 'create'])->name('shoes.create');
  Route::post('/shoes/store', [ShoeController::class, 'store'])->name('shoes.store');
  Route::delete('/shoes/destroy/{shoe}', [ShoeController::class, 'destroy'])->name('shoes.destroy');
  Route::get('/shoes/edit/{shoe}', [ShoeController::class, 'edit'])->name('shoes.edit');
  Route::patch('/shoes/update/{shoe}', [ShoeController::class, 'update'])->name('shoes.update');

  Route::get('/category', [CategoryController::class, 'index'])->name('categories');
  Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
  Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
  Route::delete('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
  Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
  Route::patch('/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::view('/', 'home')->name('home');
});

require __DIR__ . '/auth.php';
