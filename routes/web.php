<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEB Routes
|--------------------------------------------------------------------------
*/
Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    echo "Hurray! Cache, Config, View Are cleared";
});

Route::fallback('\App\Http\Controllers\HomeController@show404');

Route::get('/', '\App\Http\Controllers\AuthController@login');

Route::prefix('/auth')->group(function () {
    Route::get('/', '\App\Http\Controllers\AuthController@login');
    Route::get('/login', '\App\Http\Controllers\AuthController@login');
    Route::get('/forgot-password', '\App\Http\Controllers\AuthController@forgotPassword');
    Route::get('/reset/{reset_password_token}', '\App\Http\Controllers\AuthController@reset');
    Route::get('/change-password', '\App\Http\Controllers\AuthController@changePassword');
    Route::get('/account-settings', '\App\Http\Controllers\AuthController@accountSettings');
});


Route::get('/student/register', '\App\Http\Controllers\StudentController@registerStudent');


Route::middleware('CheckUser')->group(function () {

    Route::get('/home', '\App\Http\Controllers\HomeController@index');
    Route::get('/dashboard', '\App\Http\Controllers\DashboardController@index');


    Route::prefix('/categories')->middleware('CheckUser:admin')->group(function () {
        Route::get('/', '\App\Http\Controllers\CategoryController@index');
        Route::get('/create', '\App\Http\Controllers\CategoryController@create');
        Route::get('/{id}/edit', '\App\Http\Controllers\CategoryController@edit');
    });

    Route::prefix('/orders')->middleware('CheckUser:admin')->group(function () {
        Route::get('/', '\App\Http\Controllers\OrderController@index');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', '\App\Http\Controllers\UserController@index');
        Route::get('/create', '\App\Http\Controllers\UserController@create');
        Route::get('/{id}/edit', '\App\Http\Controllers\UserController@edit');
    });

    Route::prefix('/unit-measures')->middleware('CheckUser:admin')->group(function () {
        Route::get('/', '\App\Http\Controllers\UnitMeasureController@index');
        Route::get('/create', '\App\Http\Controllers\UnitMeasureController@create');
        Route::get('/{id}/edit', '\App\Http\Controllers\UnitMeasureController@edit');
    });

    Route::prefix('/tags')->middleware('CheckUser:admin')->group(function () {
        Route::get('/', '\App\Http\Controllers\TagController@index');
        Route::get('/create', '\App\Http\Controllers\TagController@create');
        Route::get('/{id}/edit', '\App\Http\Controllers\TagController@edit');
    });

    Route::prefix('/products')->middleware('CheckUser:admin')->group(function () {
        Route::get('/', '\App\Http\Controllers\ProductController@index');
        Route::get('/create', '\App\Http\Controllers\ProductController@create');
        Route::get('/{id}/edit', '\App\Http\Controllers\ProductController@edit');
        Route::get('/stock-report', '\App\Http\Controllers\ProductController@stockReport');
        Route::get('/import-products', '\App\Http\Controllers\ProductController@importProducts');

    });
});


