<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RegistroGliderController;
use App\Http\Controllers\FlightReviewController;
use App\Http\Controllers\RegistroGlider2Controller;
use App\Http\Controllers\RegistroGlider3Controller;


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

// Subcategorías
Route::get('/category/{categorySlug}/{subcategorySlug}', [CategoryController::class, 'showSubcategory'])->name('subcategories.show');
Route::get('/categorias/{categorySlug}/{subcategorySlug}', [CategoryController::class, 'showSubcategory'])->name('categories.subcategory');

/* Registro
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');*/
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
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Google
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

// Facebook
Route::get('auth/facebook', [SocialAuthController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);

//Editar perfil
Route::middleware(['auth'])->group(function () {
    Route::get('/editProfile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/editProfile', [UserProfileController::class, 'update'])->name('profile.update');
});

// Conviértete en Glider
Route::get('/registro-glider', [RegistroGliderController::class, 'registroGlider'])->name('registro.glider');

Route::post('/glider/step1', [RegistroGliderController::class, 'storeStep1'])->name('glider.store.step1');
Route::post('/registro-glider2/store', [RegistroGlider2Controller::class, 'store'])->name('registroGlider2.store');
Route::post('/glider/step3', [RegistroGlider3Controller::class, 'storeStep3'])->name('glider.store.step3');






Route::get('/glider', function () {
    return view('glider');
});

// ===============================
// DETALLE DE VUELO
// ===============================
Route::get('/vuelo/{id}', [FlightController::class, 'show'])->name('flights.show');

// ===============================
// comentarios de vuelos
// ===============================
Route::post('/flight/{id}/review', [FlightReviewController::class, 'store'])
    ->middleware('auth')
    ->name('flight.review');

// ===============================
// para guardar las reseñas
// ===============================
Route::post('/flight/{id}/review', [FlightReviewController::class, 'store'])
    ->name('reviews.store');




//Route::get('/', [FlightController::class, 'index'])->name('home');

//Route::get('/categories/{id}/subcategories', [SubcategoryController::class, 'byCategory'])
    // ->name('categories.subcategories');


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
