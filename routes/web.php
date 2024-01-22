<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Admin\PaymentCallbackController;
use App\Http\Controllers\Admin\ReturnController;

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

// home
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/add-cart', [CartController::class, 'addCart'])->middleware('auth');
Route::post('/update-cart', [CartController::class, 'updateCart'])->middleware('auth');
Route::post('/delete-cart', [CartController::class, 'delete'])->middleware('auth');
Route::get('/my-account', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/payment', [CheckoutController::class, 'payment'])->middleware('auth');
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{idProduct}', [ProductController::class, 'get']);
Route::get('/product-detail', [ProductController::class, 'detail']);
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/addpayment', [CheckoutController::class, 'add_payment']);
Route::get('/order', [CheckoutController::class, 'order'])->middleware('auth');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/admin-produk', [AdminProductController::class, 'index']);
Route::get('/admin-produk/update/{idProduct}', [AdminProductController::class, 'update']);
Route::post('/admin-produk/update/', [AdminProductController::class, 'put']);
Route::get('/admin-produk/add/', [AdminProductController::class, 'create']);
Route::post('/admin-produk/add/', [AdminProductController::class, 'add']);
Route::post('/admin-produk/delete/', [AdminProductController::class, 'delete']);
Route::get('/transaksi', [AdminTransactionController::class, 'index']);
Route::get('/transaksi/{idTransaction}', [AdminTransactionController::class, 'get']);
Route::get('/pengembalian', [ReturnController::class, 'index']);
Route::get('/pengembalian/add', [ReturnController::class, 'add']);
Route::post('/pengembalian/add', [ReturnController::class, 'post']);
Route::post('/pengembalian/delete', [ReturnController::class, 'delete']);
Route::get('/detail-transaksi', [ReturnController::class, 'transaction']);

Route::post('/payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
