<?php

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::group(['namespace' => 'Admin','middleware' => ['auth:api', 'admin']], function(){
	Route::get('statistics', 'Dashboard@statistics');
	Route::resource('users', 'UserController',['except' => ['create', 'show']]);
	Route::resource('cat', 'CatController',['except' => ['create','show']]);
	Route::resource('post', 'PostController');

});
Route::patch('user/{id}', 'HomeController@updateAvatar')->middleware('auth:api');
