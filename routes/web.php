<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\CartController;



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

///product managing routes
Route::get('/manage-products', [ProductController::class , 'index'])->name('product-lists');
Route::post('/product-store', [ProductController::class , 'store_product'])->name('products-store');
Route::POST('/products/edit', [ProductController::class, 'edit_product'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update_product'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'delete_product'])->name('products.destroy');
///product managing routes end


//cart list route
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::get('/admin/cart', [ProductController::class, 'cart_lists'])->name('cart-lists');
//cart list route end

///product dispaly routes
Route::get('/shop-products', [UserController::class , 'index'])->name('shop-products');
Route::get('/product/{id}/{slug}', [UserController::class, 'display_product'])->name('display-products');
Route::get('/cart', [UserController::class, 'users_cart_list'])->name('users-cart-lists');
///product dispaly routes end





