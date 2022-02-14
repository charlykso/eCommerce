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
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

//product route
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('upload');
Route::post('/product/upload', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('detail/{id}', [App\Http\Controllers\ProductController::class, 'show']);
Route::post('/detail/{id}/add_to_cart', [App\Http\Controllers\ProductController::class, 'addToCart']);