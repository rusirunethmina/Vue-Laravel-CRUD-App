<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add_user_ad','API\ApiHomeController@add_user');  //insert

Route::get('get_user_data','API\ApiHomeController@get_user'); //retivew

Route::get('search_value/{search_data}','API\ApiHomeController@search_user'); //search

Route::patch('update_user_data/{id}','API\ApiHomeController@update_user'); //update

Route::delete('delete_user/{id}','API\ApiHomeController@delete_user'); //delete
