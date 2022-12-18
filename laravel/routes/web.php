<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'registerPost']);

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'loginPost']);

Route::get('index', [ProductController::class, 'index'])->name('index');

Route::get('show/{product}', [ProductController::class, 'show'])->name('show');

Route::middleware('auth')->group(function (){
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware('isAdmin')->group(function (){
        Route::group(['prefix' => '/admin', 'as' => 'admin.'], function (){
            Route::resource('products', ProductController::class);
            Route::resource('categories', CategoryController::class);
        });
    });

    Route::group(['prefix' => '/order', 'as' => 'order.'], function (){
        Route::get('basket', [OrderController::class, 'basket'])->name('basket');
        Route::post('/basket', [OrderController::class, 'basketPost']);
        Route::get('basketAdd', [OrderController::class, 'basketAdd'])->name('basketAdd');
    });
});
