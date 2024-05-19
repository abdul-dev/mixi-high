<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/auth')->group(function () {
    Route::post('/authenticate', '\App\Http\Controllers\AuthController@authenticate');
    Route::post('/forgot-password-check', '\App\Http\Controllers\AuthController@forgotPasswordCheck');
    Route::post('/reset-password', '\App\Http\Controllers\AuthController@resetPassword');
    Route::post('/update-password', '\App\Http\Controllers\AuthController@updatePassword');
    Route::post('/update-account-settings', '\App\Http\Controllers\AuthController@updateAccountSettings');

    Route::post('/logout', '\App\Http\Controllers\AuthController@logout');
});

Route::post('settings/update-general-settings', '\App\Http\Controllers\SettingController@updateSettings');

Route::prefix('/users')->group(function () {
    Route::post('/store', '\App\Http\Controllers\UserController@store');
    Route::post('/update', '\App\Http\Controllers\UserController@update');
    Route::post('/delete', '\App\Http\Controllers\UserController@destroy');
});

Route::prefix('/categories')->group(function () {
    Route::post('/all', '\App\Http\Controllers\CategoryController@all');
    Route::post('/store', '\App\Http\Controllers\CategoryController@store');
    Route::post('/update', '\App\Http\Controllers\CategoryController@update');
    Route::post('/delete', '\App\Http\Controllers\CategoryController@destroy');
});

Route::prefix('/unit-measures')->group(function () {
    Route::post('/all', '\App\Http\Controllers\UnitMeasureController@all');
    Route::post('/store', '\App\Http\Controllers\UnitMeasureController@store');
    Route::post('/update', '\App\Http\Controllers\UnitMeasureController@update');
    Route::post('/delete', '\App\Http\Controllers\UnitMeasureController@destroy');
});

Route::prefix('/tags')->group(function () {
    Route::post('/all', '\App\Http\Controllers\TagController@all');
    Route::post('/store', '\App\Http\Controllers\TagController@store');
    Route::post('/update', '\App\Http\Controllers\TagController@update');
    Route::post('/delete', '\App\Http\Controllers\TagController@destroy');
});

Route::prefix('/products')->group(function () {
    Route::post('/all', '\App\Http\Controllers\ProductController@all');
    Route::post('/search', '\App\Http\Controllers\ProductController@search');
    Route::post('/search-by-code', '\App\Http\Controllers\ProductController@searchByCode');
    Route::post('/store', '\App\Http\Controllers\ProductController@store');
    Route::post('/update', '\App\Http\Controllers\ProductController@update');
    Route::post('/delete', '\App\Http\Controllers\ProductController@destroy');
    Route::get('/download-csv', '\App\Http\Controllers\ProductController@downloadCsv');
    Route::get('/download-excel', '\App\Http\Controllers\ProductController@downloadExcel');
    Route::get('/download-pdf', '\App\Http\Controllers\ProductController@downloadPdf');
    Route::get('/using-pagination', '\App\Http\Controllers\ProductController@usingPagination');
    Route::post('/attachment-delete', '\App\Http\Controllers\ProductController@attachmentDelete');
});

Route::prefix('/permissions')->group(function () {
    Route::post('/update', '\App\Http\Controllers\PermissionController@update');
});


Route::prefix('/app')->group(function () {

    Route::post('auth/login', 'App\Http\Controllers\App\AuthController@loginBackend');
    Route::post('auth/register', 'App\Http\Controllers\App\AuthController@registerBackend');
    Route::post('auth/forgot-password-check', 'App\Http\Controllers\App\AuthController@forgotPasswordCheck');
    Route::post('auth/reset-password', 'App\Http\Controllers\App\AuthController@resetPassword');
    Route::post('auth/logout', '\App\Http\Controllers\App\AuthController@Logout');
    Route::post('auth/verify-user', '\App\Http\Controllers\App\AuthController@verifyUser');
    Route::get('states', '\App\Http\Controllers\App\AuthController@getStates');

    Route::prefix('/products')->group(function () {
        Route::get('/all', 'App\Http\Controllers\App\ProductController@all');
        Route::post('/get-by-category-id', 'App\Http\Controllers\App\ProductController@getByCategoryId');
        Route::get('/get-random', '\App\Http\Controllers\App\ProductController@getRandomProducts');
        Route::post('/detail', 'App\Http\Controllers\App\ProductController@detail');
    });

    Route::prefix('/product-reviews')->group(function () {
        Route::post('/reviews-by-product-id', 'App\Http\Controllers\App\ProductReviewController@reviewsByProductId');
    });

    Route::get('categories/all', 'App\Http\Controllers\App\CategoryController@all');

    Route::prefix('/users')->group(function () {
        Route::post('/store', 'App\Http\Controllers\App\UserController@store');
        Route::post('/{id}/delete', 'App\Http\Controllers\App\UserController@destroy');
        Route::post('/{id}/show', 'App\Http\Controllers\App\UserController@show');
        Route::post('/update', 'App\Http\Controllers\App\UserController@update');
        Route::post('/all', 'App\Http\Controllers\App\UserController@all');
    });


    Route::middleware('auth:sanctum')->group(function () {

        Route::post('add-bank-account', '\App\Http\Controllers\App\AuthController@storeBankAccount');

        Route::post('auth/get-profile', 'App\Http\Controllers\App\AuthController@show');
        Route::post('auth/update-profile', 'App\Http\Controllers\App\AuthController@accountSettingUpdate');
        Route::post('auth/store-deliveries-addresses', '\App\Http\Controllers\App\AuthController@storeDeliveriesAddresses');
        Route::post('auth/set-default-address', '\App\Http\Controllers\App\AuthController@setDefaultAddress');
        Route::delete('auth/delete-address', '\App\Http\Controllers\App\AuthController@deleteAddress');
        Route::get('auth/get-deliveries-addresses', '\App\Http\Controllers\App\AuthController@getDeliveriesAddresses');

        Route::prefix('/orders')->group(function () {
            Route::post('/store', 'App\Http\Controllers\App\OrderController@store');
            Route::post('/get-my-orders', 'App\Http\Controllers\App\OrderController@getMyOrders');
        });

        Route::prefix('/payment-methods')->group(function () {
            Route::post('/store', 'App\Http\Controllers\App\BillingPaymentMethodController@store');
            Route::post('/all', 'App\Http\Controllers\App\BillingPaymentMethodController@all');
        });

        Route::prefix('/product-reviews')->group(function () {
            Route::post('/store', 'App\Http\Controllers\App\ProductReviewController@store');
        });
    });

});
