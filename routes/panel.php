<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Panel\Auth\LoginController::class, 'show'])->name('auth.login.show');
    Route::post('login', [\App\Http\Controllers\Panel\Auth\LoginController::class, 'login'])->name('auth.login');
    Route::get('logout', [\App\Http\Controllers\Panel\Auth\LoginController::class, 'logout'])->name('auth.logout');
});
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/', [App\Http\Controllers\Panel\PanelController::class, 'index']);
    Route::resource('products', \App\Http\Controllers\Panel\Product\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Panel\CategoryController::class);
    Route::resource('brands', \App\Http\Controllers\Panel\BrandController::class);
    Route::resource('characteristics', \App\Http\Controllers\CharacteristicController::class);
    Route::resource('characteristic_groups', \App\Http\Controllers\CharacteristicGroupController::class);
    Route::resource('attributes', \App\Http\Controllers\AttributeController::class);
    Route::resource('attribute_groups', \App\Http\Controllers\AttributeGroupController::class);

    Route::group(['prefix' => 'files'], function () {
        Route::post('upload', [\App\Http\Controllers\FileController::class, 'upload'])->name('files.upload');
    });

    Route::group(['prefix' => 'filepond'], function () {
        Route::post('process', [\App\Http\Controllers\FilePondController::class, 'process']);
        Route::delete('revert', [\App\Http\Controllers\FilePondController::class, 'revert']);
        Route::get('load', [\App\Http\Controllers\FilePondController::class, 'load']);
        Route::post('remove', [\App\Http\Controllers\FilePondController::class, 'remove']);
    });
});
