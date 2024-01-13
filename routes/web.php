<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/add-cart', [CartController::class, 'addCart'])->middleware('auth');
Route::post('/update-cart', [CartController::class, 'updateCart'])->middleware('auth');
Route::get('/my-account', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{idProduct}', [ProductController::class, 'get']);
Route::get('/product-detail', [ProductController::class, 'detail']);
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/addpayment', [CheckoutController::class, 'add_payment']);
