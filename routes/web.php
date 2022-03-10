<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJsController;

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

Route::get('/', function() {
    return view('guest.home');
});





Auth::routes();

Route::middleware('auth')
        ->namespace('Admin')
        ->name('admin.')
        ->prefix('admin')
        ->group(function() {
            
            Route::get('/', 'HomeController@index')->name('home');

            Route::get('/message', 'HomeController@message')->name('message');

            Route::get('/review', 'HomeController@review')->name('review');

            Route::get('/premium', 'HomeController@premium')->name('premium');

            Route::get('/statistic', 'HomeController@getAverageForCurrentYear')->name('statistic');

            Route::get('/statistic/{year}', 'HomeController@getAverageForSelectedYear')->name('statistic.year');

            Route::get('/statistic_count', 'HomeController@getCountForCurrentYear')->name('statistic.count');

            Route::get('/profile/show', 'ProfileController@show')->name('show');

            Route::get('/profile/edit', 'ProfileController@edit')->name('edit');

            Route::put('/profile/update', 'ProfileController@update')->name('update');

            Route::delete('/profile/destroy', 'ProfileController@destroy')->name('destroy');

            Route::get('/orders/premium_plans', 'Premium_planController@index')->name('premium_plan');

            Route::get('/orders/generate', 'OrderController@generate')->name('generateOrder');

            Route::post('/orders/payment', 'OrderController@makePayment')->name('payment');

        });

Route::get('{any?}', function() {
    return view('guest.home');
})->where('any', '.*')->name('home');
