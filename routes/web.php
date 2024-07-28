<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to
| the "web" middleware group. Now create something great!
|
*/



// Route::get('profiles', function () {return view('customers.profile');})->name('customer.profile');







// Route::apiResource('/authors', AuthorController::class);
// // Route::apiResource('/books', BookController::class);
// // Route::apiResource('/histories', HistoryController::class);
// Route::apiResource('/borrows', BorrowController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware(['auth'])->group(function () {



    // Route::resource('photo', PhotoController::class);
    // Route::resource('author', AuthorController::class);
    // Route::resource('customer', CustomerController::class);
    // Route::resource('book', BookController::class);
    // Route::resource('history', HistoryController::class);
    // Route::resource('borrow', BorrowController::class);
    // Route::resource('customer', CustomerController::class);
    // Route::get('restore/{id}', [HistoryController::class, 'restore']);
    // ./vendor/bin/phpunit

    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProductController::class);
    Route::get('/', function () {return view('layouts.adminlte');})->name('home');
    Route::get('/dashboard', function () {return view('layouts.adminlte');})->name('customer.dashboard');





});




// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);




