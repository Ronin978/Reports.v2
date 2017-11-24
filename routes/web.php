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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontController@index');

Route::get('/show/{id}', 'FrontController@show');
Route::get('/show/{table}/sort', 'FrontController@sort');
Route::get('/QuickFind', 'FrontController@QuickFind');
Route::get('/DateFind', 'FrontController@DateFind');
Route::get('/myShow/{date}/{table}', 'FrontController@myShow');
Route::get('/sortShow/{viddil}/{table}/{date}', 'FrontController@sortShow');

Route::group(['prefix'=>'report','middleware'=>'auth'], function()
{ 
    Route::get('/create/{table}/', 'ReportController@create');

	Route::post('/store1', 'ReportController@store1');
	Route::post('/store2', 'ReportController@store2');
	Route::post('/store3', 'ReportController@store3');
	Route::post('/store4', 'ReportController@store4');
	Route::post('/store5', 'ReportController@store5');
	Route::post('/store6', 'ReportController@store6');   

	Route::put('/update/{table}/{newDate}', 'ReportController@update');

	Route::get('/edit/{table}/{date}', 'FrontController@edit');
});

Route::post('/reports/{date}', 'ReportController@reportsForm');

Route::resource('/groups', 'GroupController');

