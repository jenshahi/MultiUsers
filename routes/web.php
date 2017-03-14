<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/showusers', 'AdminController@index');
    Route::get('/addusers', 'AdminController@create'); //displays form
    Route::post('/addusers', 'AdminController@store'); //stores users
    Route::get('/usersreport', 'AdminController@usersReport');
    Route::get('/usersreport/delete/{id}', 'AdminController@deleteUsersReport');
    Route::get('/report', 'AdminController@report');
});

Route::group(['middleware' => ['auth','manager']], function () {
    Route::get('/manager/home', 'ManagerController@index');
});

Route::group(['middleware' => ['auth','moderator']], function () {
    Route::get('/moderator/home', 'ModeratorController@index');
});

Route::group(['middleware' => ['auth','editor']], function () {
    Route::get('/editor/home', 'EditorController@index');
});
