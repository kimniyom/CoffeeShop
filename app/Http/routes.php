<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('home');
});

Route::get('home', function () {
    return view('home');
});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    //
});



Route::group(['prefix' => 'test'], function () {
    Route::get('index', 'TestController@index');
    Route::get('from', 'TestController@from');
    Route::post('post', 'TestController@post');
});

Route::group(['prefix' => 'backend'], function () {
    Route::group(['prefix' => 'type'], function () {
        Route::get('index', 'Backend\TypeController@index');
        Route::get('create', 'Backend\TypeController@create');
        Route::post('upload', 'Backend\TypeController@upload');
        Route::post('images', 'Backend\TypeController@images');
        Route::post('save', 'Backend\TypeController@save');
        Route::get('update/{id}', 'Backend\TypeController@update');
        Route::post('saveupdate', 'Backend\TypeController@saveupdate');
    });

    //Group Photo
    Route::group(['prefix' => 'photo'], function () {
        Route::get('index', 'Backend\PhotoController@index');
        Route::get('preview', 'Backend\PhotoController@preview');
        Route::post('action', 'Backend\PhotoController@action');
        Route::post('delete', 'Backend\PhotoController@delete');
    });
});
