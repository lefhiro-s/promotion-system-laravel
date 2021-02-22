<?php

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
    return view('home');
});




Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['web','custom_auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/promotions', [App\Http\Controllers\PromotionController::class, 'index'])->name('promotions');
    Route::post('/storePromotions', [App\Http\Controllers\PromotionController::class, 'storePromotion'])->name('storePromotion');
    Route::post('/storeConditions', [App\Http\Controllers\PromotionController::class, 'storeCondition'])->name('storeCondition');
    Route::post('/storeItems', [App\Http\Controllers\PromotionController::class, 'storeItem'])->name('storeItem');
    Route::post('/storePhotos', [App\Http\Controllers\PromotionController::class, 'storePhoto'])->name('storePhoto');
    Route::post('/update-general', [App\Http\Controllers\PromotionController::class, 'updatePromotion'])->name('update-general');
    Route::post('/update-conditions', [App\Http\Controllers\PromotionController::class, 'updateCondition'])->name('update-conditions');
    Route::post('/update-items', [App\Http\Controllers\PromotionController::class, 'updateItem'])->name('update-items');
    Route::post('/update-photos', [App\Http\Controllers\PromotionController::class, 'updatePhoto'])->name('update-photos');
    Route::get('/edit-promotion', [App\Http\Controllers\PromotionController::class, 'editPromotion'])->name('edit-promotion');
    Route::get('/edit-conditions', [App\Http\Controllers\PromotionController::class, 'editCondition'])->name('edit-conditions');
    Route::get('/edit-items', [App\Http\Controllers\PromotionController::class, 'editItems'])->name('edit-items');
    Route::get('/edit-photos', [App\Http\Controllers\PromotionController::class, 'editPhotos'])->name('edit-photos');
});

