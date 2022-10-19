<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\OtherProductController;
use App\Http\Controllers\Front\CartCotroller;
use App\Http\Controllers\Front\CheckoutController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductsController::class, 'index'])->name('product.index');

Route::get('/products/{product:slug}', [ProductsController::class, 'show'])->name('product.show');

Route::get('/other_product', [OtherProductController::class, 'index'])->name('other_prodcut.index');

Route::get('/other_product/{product:slug}', [OtherProductController::class, 'show'])->name('other_prodcut.show');

Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'store']);

Route::resource('cart', Front\CartCotroller::class);

Route::post('/paypal/webhook', function(){
    echo 'webhook called!';
});


// require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';

