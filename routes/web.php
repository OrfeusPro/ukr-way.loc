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

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function () {
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::post('/form-process', [MainController::class, 'form_process'])->name('form_process');
    Route::post('/thanks', [MainController::class, 'thanks'])->name('thanks');
});
	
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
