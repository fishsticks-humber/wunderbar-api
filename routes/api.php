<?php

use Illuminate\Http\Request;
Use App\Restaurant;

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
Route::get('restaurants', 'RestaurantController@index');
Route::get('restaurants/{restaurant}', 'RestaurantController@show');
Route::post('restaurants', 'RestaurantController@store');
Route::put('restaurants/{restaurant}', 'RestaurantController@update');
Route::delete('restaurants/{restaurant}', 'RestaurantController@delete');