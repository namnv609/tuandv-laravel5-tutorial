<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect(url('/user'));
});

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function() {
    Route::get('/', 'CategoryController@index');
    
    Route::group(['prefix' => 'categories'], function() {
        get('/', 'CategoryController@index');
        get('/create', 'CategoryController@getCreate');
        post('/create', 'CategoryController@postCreate');
        get('/{categoryId}/edit', 'CategoryController@getEdit')->where('id', '^[0-9]+$');
        post('/{categoryId}/edit', 'CategoryController@postEdit')->where('id', '^[0-9]+$');
    });
    
    Route::group(['prefix' => 'contents'], function() {
        get('/', 'ContentController@index');
        get('/create', 'ContentController@getCreate');
        post('/create', 'ContentController@postCreate');
        get('/{contentId}/edit', 'ContentController@getEdit')->where('id', '^[0-9]+$');
        post('/{contentId}/edit', 'ContentController@postEdit')->where('id', '^[0-9]+$');
    });
});

Route::group(['prefix' => 'user','namespace' => 'User'], function() {
    Route::get('/', 'HomepageController@index');
    get('/{categoryId}/category', 'HomepageController@getContent')->where('id', '^[0-9]+$');
    get('contents/{contentId}/detail', 'HomepageController@getDetail')->where('id', '^[0-9]+$');
});
