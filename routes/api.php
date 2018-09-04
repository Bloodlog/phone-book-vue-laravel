<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('contact')->group(function () {
    Route::get('/', 'Api\PhonesController@index');
    Route::put('/{contact}', 'Api\PhonesController@update');
    Route::post('/', 'Api\PhonesController@create');
    Route::delete('/', 'Api\PhonesController@destroy');
});

