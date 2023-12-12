<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\UserController;
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
  // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  // Route::get('/dashboard/getUser', [DashboardController::class, 'getUsers'])->name('dashboard.getUser');

  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
  Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
  Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
  Route::patch('/user/update/{user}', [UserController::class, 'update'])->name('users.update');
  Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

  Route::get('/shoes', [ShoeController::class, 'index'])->name('shoes.index');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::view('/', 'home')->name('home');
});

require __DIR__ . '/auth.php';
