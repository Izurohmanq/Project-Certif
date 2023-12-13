<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ProfileController;

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
  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
  Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
  Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
  Route::patch('/user/update/{user}', [UserController::class, 'update'])->name('users.update');
  Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

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

  Route::get('/rents', [RentalController::class, 'index'])->name('rents.index');

});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/myrents', [RentalController::class, 'myRent'])->name('myrents.myrents');

  Route::get('/', [HomeController::class, 'index'])->name('home');
  Route::get('/', [HomeController::class, 'searchShoes'])->name('home');
  Route::post('/myrents', [HomeController::class, 'store'])->name('myrents.store');
});

require __DIR__ . '/auth.php';
