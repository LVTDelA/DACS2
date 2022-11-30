<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin\HomeController;

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


//User
Route::prefix('user')->group(function () {
    Route::get('/{id}/index', [Front\UserController::class, 'index']);
});

Route::prefix('shop')->group(function () {
    Route::get('/product/{id}', [Front\ShopController::class, 'show']);

    Route::get('/', [Front\ShopController::class, 'index']);

    Route::get('/{categoryName}', [Front\ShopController::class, 'category']);
});


Route::prefix('cart')->group(function () {
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

    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function () {
        Route::get('/', [Front\AccountController::class, 'myOrderIndex']);
        Route::get('/{id}', [Front\AccountController::class, 'myOrderShow']);
    });
});

Route::prefix('blog')->group(function () {
    Route::get('/', [Front\BlogController::class, 'index']);
    Route::get('/{id}', [Front\BlogController::class, 'show']);
});

Route::get('contact', [Front\ContactController::class, 'index']);

// Admin

Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
//    Route::redirect('','admin/user');

    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('category', \App\Http\Controllers\Admin\ProductCategoryController::class);
    Route::resource('brand', \App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('product/{product_id}/image', \App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('product/{product_id}/image', \App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('order', \App\Http\Controllers\Admin\OrderController::class);
    Route::prefix('manage')->group(function () {
        Route::get('', [App\Http\Controllers\Admin\ManageController::class, 'index']);

        Route::get('dataChartLine', [App\Http\Controllers\Admin\ManageController::class, 'getDataChartLine']);
    });

    Route::prefix('login')->group(function () {
        Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [App\Http\Controllers\Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout', [App\Http\Controllers\Admin\HomeController::class, 'logout']);

});
