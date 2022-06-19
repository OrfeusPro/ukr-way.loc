<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CommentsController;
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

    Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
    Route::put('/comments/add', [CommentsController::class, 'store'])->name('addcomment');

    Route::post('/form-process', [MainController::class, 'form_process'])->name('form_process');
    Route::post('/contact-process', [MainController::class, 'contact_process'])->name('contact_process');
    Route::get('/about-us', [MainController::class, 'about_us'])->name('about-us');
    Route::get('/thanks', [MainController::class, 'thanks'])->name('thanks');
    Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
    Route::get('/{page}', [MainController::class, 'page'])->name('page');
    Route::get('/country/all', [MainController::class, 'country_all'])->name('country_all');
    Route::get('/country/{country}', [MainController::class, 'country'])->name('country');
    Route::get('/route/{mroute}', [MainController::class, 'mroute'])->name('mroute');
});