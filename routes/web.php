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
Route::get('/signin', [App\Http\Controllers\LoginController::class, 'signin'])->name('Signin');
Route::post('/signin', [App\Http\Controllers\LoginController::class, 'getLogin']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');