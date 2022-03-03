<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')
    ->prefix('job_roles')
    ->group(function(){
        Route::get('/','Job_roleController@index');
        Route::get('/{name}','Job_roleController@search');
        Route::get('/user','Job_roleController@usera');
        Route::get('/prova','prova@index');
        
    });

    