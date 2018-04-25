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

Route::get('/users', 'UserController@getUsers')->middleware('auth:api');

Route::prefix('user')->group(function(){
    Route::post('add', 'UserController@addUser');
    Route::get('{id}', 'UserController@getUserDetails')->middleware('auth:api');
    Route::put('{id}/update', 'UserController@updateUser')->middleware('auth:api');
    Route::delete('{id}', 'UserController@deleteUser')->middleware('auth:api');
});
