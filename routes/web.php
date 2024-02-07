<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;

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
    return view('index');
});

// Register 

Route::get('/register', [UserController::class, 'create'])->name('registerForm');
Route::post('/register', [UserController::class, 'store'])->name('register');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware("auth");

// Login

Route::get('/admin', [UserController::class, 'LoginForm'])->name('login');
Route::any('/authenticate', [UserController::class, 'authenticate']);

// Logout

Route::post('/logout', [UserController::class, 'logout']);


// Post Brand(s)
Route::post('/post', [BrandController::class, 'store'])->middleware("auth");

// Get user Post(s)
Route::get('/dashboard', [BrandController::class, 'userPosts'])->middleware("auth");

// Edit Brand
Route::get('/edit/{id}', [BrandController::class, 'edit'])->middleware("auth");
Route::put('/update/{id}', [BrandController::class, 'update'])->middleware("auth");

// Show Brand(s)

Route::get('/', [BrandController::class, 'show']);

// Delete
Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->middleware("auth");