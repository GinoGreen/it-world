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

Route::get('/', function () {
    return view('guest.welcome');
});

Route::get('chartjs', [ChartJsController::class, 'index'])->name('chartjs.index');
Route::get('chartjs/{prova}', [ChartJsController::class, 'prova'])->name('chartjs.prova');

Auth::routes();

Route::middleware('auth')
        ->namespace('Admin')
        ->name('admin.')
        ->prefix('admin')
        ->group(function() {
            
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/edit', 'HomeController@edit')->name('edit');
            Route::get('/message', 'HomeController@message')->name('message');
            Route::get('/review', 'HomeController@review')->name('review');
            Route::get('/statistic', 'HomeController@statistic')->name('statistic');
           
        });