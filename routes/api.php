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
        Route::get('/{role}','Job_roleController@search');
    });

Route::namespace('Api')
    ->prefix('profile')
    ->group(function(){
        Route::get('/','UserController@index');
        Route::get('/{profile_id}','UserController@show');
    });

    