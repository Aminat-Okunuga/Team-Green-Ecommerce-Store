<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes ( ['register' => false]);
// Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// User route
Route::resource('users', UserController::class)->middleware(['auth']);

// Customer route
Route::resource('customers', CustomerController::class)->middleware(['auth']);

// categories route
Route::resource('category', CategoryController::class)->middleware('auth');

// Subcategory route
Route::resource('subcategory', SubcategoryController::class)->middleware('auth');

// products route
Route::resource('products', ProductController::class)->middleware('auth');

// Orders route
Route::resource('orders', OrderController::class)->middleware('auth');

// Shipping route
Route::resource('shipping', ShippingController::class)->middleware('auth');



require __DIR__.'/auth.php';
