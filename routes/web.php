<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/signin', function(){
//     return view('auth.signin');
// });

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
//auth route
Route::get('/signin', [App\Http\Controllers\LoginController::class, 'signin'])->name('Signin');
Route::post('/signin', [App\Http\Controllers\LoginController::class, 'getLogin']);
Route::get('/register', [App\Http\Controllers\UserController::class, 'Register'])->name('Register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'getRegistered']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

//product route
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('upload');
Route::post('/product/upload', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('detail/{id}', [App\Http\Controllers\ProductController::class, 'show']);
Route::post('/detail/{id}/add_to_cart', [App\Http\Controllers\ProductController::class, 'addToCart']);

//cart
Route::get('/cartlist', [App\Http\Controllers\ProductController::class, 'myCartList'])->name('myCart');
Route::get('/removeItem/{id}', [App\Http\Controllers\ProductController::class, 'DeleteItem'])->name('deleteItem');

//order route
Route::get('/orderNow', [App\Http\Controllers\ProductController::class, 'OrderNow'])->name('orderNow');
Route::post('/placeOrder', [App\Http\Controllers\ProductController::class, 'placeOrderNow'])->name('placeorderNow');
Route::get('/myPlacedOrders', [App\Http\Controllers\ProductController::class, 'MyPlacedOrders'])->name('myPlacedOrders');
