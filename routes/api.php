<?php
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


// Public
Route::group([
    'namespace' => 'Api'
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@store');
});

// Protected
Route::group([
    'middleware' => 'jwt.auth',
    'namespace' => 'Api'
], function () {

    Route::group([
        'prefix' => 'pictures',
        'namespace' => 'Pictures'
    ], function () {
        Route::get('/', 'PicturesController@index');
        Route::post('/', 'PicturesController@store');
    });
    
});