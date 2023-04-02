<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageCollectController;
use App\Http\Controllers\Lev1Controller;
use App\Http\Controllers\Lev2Controller;
use App\Http\Controllers\Lev3Controller;
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

Route::prefix('scrape')->group(function () {
    Route::get('cats', [ImageCollectController::class, 'cats']);
    Route::get('items', [ImageCollectController::class, 'items']);
    Route::get('icons', [ImageCollectController::class, 'icons']);
});
Route::prefix('/')->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/{lev1}', Lev1Controller::class)->name('categories');
    Route::get('/{lev1}/{lev2}', Lev2Controller::class)->name('items');
    Route::get('/{lev1}/{lev2}/{item}', Lev3Controller::class)->name('item');
});
