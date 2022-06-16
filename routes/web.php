<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function () {
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::post('/form-process', [MainController::class, 'form_process'])->name('form_process');
    Route::post('/thanks', [MainController::class, 'thanks'])->name('thanks');
    Route::get('/{page}', [MainController::class, 'page'])->name('page');
    Route::get('/country/all', [MainController::class, 'country_all'])->name('country_all');
    Route::get('/country/{country}', [MainController::class, 'country'])->name('country');
    Route::get('/route/{mroute}', [MainController::class, 'mroute'])->name('mroute');
});
	
