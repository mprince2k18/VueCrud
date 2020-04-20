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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('all_users','HomeController@all_users');
Route::post('/new/user', 'HomeController@new_user')->name('new_user');
Route::get('edit_user/{id}', 'HomeController@edit_user')->name('edit_user');
Route::post('/update/user', 'HomeController@update_user')->name('update_user');
