<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;



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
// routes/web.php



Route::match(['get', 'post'], '/', [AuthController::class, 'landingpage']);
/////////////////////// AUTH ROUTINGS
Route::match(['get', 'post'], '/register', [AuthController::class, 'register']);
Route::match(['get', 'post'], '/signup', [AuthController::class, 'signup']);
Route::match(['get', 'post'], '/account/login', [AuthController::class, 'loginauth']);
Route::match(['get', 'post'], '/account/loginAuth', [AuthController::class, 'login']);

Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout']);

/////////////////////ADMIN ROUTINGS
Route::match(['get', 'post'], '/dashboard', [AdminController::class, 'dashboard']);
Route::match(['get', 'post'], '/category', [AdminController::class, 'category']);
Route::match(['get', 'post'], '/add_category', [AdminController::class, 'add_category']);
Route::put('/edit_category/{id}', [AdminController::class, 'category_edit']);
Route::delete('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::match(['get', 'post'], '/products', [AdminController::class, 'products']);
Route::match(['get', 'post'], '/add_products', [AdminController::class, 'add_product']);
Route::match(['get', 'post'], '/borrowed', [AdminController::class, 'borrowed']);
Route::put('/edit_product/{id}', [AdminController::class, 'edit_product']);



/////////////////////USER ROUTINGS
Route::match(['get', 'post'], '/home', [UserController::class, 'home']);

Route::match(['get', 'post'], '/product_details_{id}', [UserController::class, 'product_details']);
Route::match(['get', 'post'], '/add-to-cart', [UserController::class, 'addToCart']);
Route::match(['get', 'post'], '/cart', [UserController::class, 'cart']);

Route::match(['get', 'post'], '/cart_update', [UserController::class, 'cart_update']);
Route::match(['get', 'post'], '/cart_remove', [UserController::class, 'cart_remove']);
Route::match(['get', 'post'], '/checkout.{user_id}', [UserController::class, 'checkout']);

Route::match(['get', 'post'], '/place-order', [UserController::class, 'placeOrder']);
















