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
Route::get('/create', 'FrontController@create');
Route::get('/show/{id}', 'FrontController@show');
Route::get('/QuickFind', 'FrontController@QuickFind');
Route::post('/myShow/{date}', 'FrontController@myShow');

Route::get('/report/create1', 'ReportController@create1');
Route::get('/report/create2', 'ReportController@create2');
Route::get('/report/create3', 'ReportController@create3');
Route::get('/report/create4', 'ReportController@create4');
Route::get('/report/create5', 'ReportController@create5');
Route::get('/report/create6', 'ReportController@create6');
Route::get('/report/create7', 'ReportController@create7');
Route::get('/report/create8', 'ReportController@create8');
Route::get('/report/create9', 'ReportController@create9');
Route::get('/report/create10', 'ReportController@create10');
Route::get('/report/create11', 'ReportController@create11');

Route::post('/report/store1', 'ReportController@store1');
Route::post('/report/store2', 'ReportController@store2');
Route::post('/report/store3', 'ReportController@store3');
Route::post('/report/store4', 'ReportController@store4');
Route::post('/report/store5', 'ReportController@store5');
Route::post('/report/store6', 'ReportController@store6');

Route::post('/reports/{date}', 'ReportController@reportsForm');


Route::resource('/groups', 'GroupController');

