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
Route::get('/QuickFind', 'FrontController@QuickFind');
Route::get('/DateFind', 'FrontController@DateFind');
Route::post('/myShow/{table}/{date}', 'FrontController@myShow');

Route::group(['prefix'=>'report','middleware'=>'auth'], function()
{ 
    Route::get('/create1', 'ReportController@create1');
	Route::get('/create2', 'ReportController@create2');
	Route::get('/create3', 'ReportController@create3');
	Route::get('/create4', 'ReportController@create4');
	Route::get('/create5', 'ReportController@create5');
	Route::get('/create6', 'ReportController@create6');
	Route::get('/create7', 'ReportController@create7');
	Route::get('/create8', 'ReportController@create8');
	Route::get('/create9', 'ReportController@create9');
	Route::get('/create10', 'ReportController@create10');
	Route::get('/create11', 'ReportController@create11');

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

