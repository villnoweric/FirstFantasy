<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('league', 'LeaguesController');
Route::get('/league/{league}/alliance', 'AlliancesController@create');
Route::post('/league/{league}/alliance', 'AlliancesController@store');
Route::post('/league/{league}/invite', 'InvitationsController@store');
Route::patch('/league/{league}/invite', 'InvitationsController@update');