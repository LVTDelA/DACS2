<?php

use App\Http\Controllers\Front;
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

Route::get('/', [Front\HomeController::class, 'index']);
//Route::get('/', function (\App\Service\CoffeeProduct\CoffeeProductServiceInterface $coffeeProductService) {
//    return $coffeeProductService->all();
//});

Route::prefix('shop')->group(function() {
    Route::get('/product/{id}', [Front\ShopController::class, 'show']);

    Route::get('/', [Front\ShopController::class, 'index']);

    Route::get('/{categoryName}', [Front\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function() {
    Route::get('add', [Front\CartController::class, 'add']);
    Route::get('/', [Front\CartController::class, 'index']);
    Route::get('delete', [Front\CartController::class, 'delete']);
    Route::get('destroy', [Front\CartController::class, 'destroy']);
    Route::get('update', [Front\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [Front\CheckOutController::class, 'index']);
    Route::post('/', [Front\CheckOutController::class, 'addOrder']);

    Route::get('/vnPayCheck', [Front\CheckOutController::class, 'vnPayCheck']);
    Route::get('result', [Front\CheckOutController::class, 'result']);
});

Route::prefix('account')->group(function () {
    Route::get('login', [Front\AccountController::class, 'login']);
    Route::post('login', [Front\AccountController::class, 'checkLogin']);

    Route::get('logout', [Front\AccountController::class, 'logout']);

    Route::get('register', [Front\AccountController::class, 'register']);
    Route::post('register', [Front\AccountController::class, 'postRegister']);

    Route::prefix('my-order')->group(function () {
        Route::get('/', [Front\AccountController::class, 'myOrderIndex']);
        Route::get('/{id}', [Front\AccountController::class, 'myOrderShow']);
    });
});
