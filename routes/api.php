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

Route::get('/users', 'UserController@getUsers');
Route::delete('/users', 'UserController@deleteUsers');

Route::prefix('user')->group(function(){
    Route::post('add', 'UserController@addUser');
    Route::get('{id}', 'UserController@getUserDetails');
    Route::put('{id}/update', 'UserController@updateUser');
    Route::delete('{id}', 'UserController@deleteUser');
});
