<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add_user_ad','API\ApiHomeController@add_user');

Route::get('get_user_data','API\ApiHomeController@get_user');

Route::get('search_value/{search_data}','API\ApiHomeController@search_user');
