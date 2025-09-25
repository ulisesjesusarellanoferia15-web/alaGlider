<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AuthController;

// ===============================
// PÁGINA PRINCIPAL
// ===============================
/*Route::get('/', function () {
    return view('index');
})->name('index');*/
Route::get('/', [FlightController::class, 'index'])->name('index');

// ===============================
// CATEGORÍAS
// ===============================
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// ===============================
// SUBCATEGORÍAS
// ===============================
Route::get('/categories/{id}/subcategories', [SubcategoryController::class, 'byCategory'])
    ->name('categories.subcategories');

// ===============================
// REGISTRO Y VERIFICACIÓN
// ===============================
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/verify', [RegisterController::class, 'verify'])->name('verify.user');

// ===============================
// LOGIN
// ===============================
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ===============================
// LOGOUT
// ===============================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

/*Route::get('/', function () {
    return view('login'); // tu página principal
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/admin', function () {
    return view('admin.home');
});*/
