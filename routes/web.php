<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
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

//User route
Route::resource('users', UserController::class)->middleware(['auth']);

//Customer route
Route::resource('customers', CustomerController::class)->middleware(['auth']);

//products route
Route::resource('products', productController::class)->middleware('auth');

//categories route
Route::resource('category', categoryController::class)->middleware('auth');

require __DIR__.'/auth.php';
