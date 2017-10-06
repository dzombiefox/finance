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
    return view('welcome');
});
Route ::get('/report',function(){
return 1;

});
Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::resource('admin/posts', 'Admin\\PostsController');

Route::resource('admin/banks', 'Admin\\BanksController');

Route::resource('admin/owners', 'Admin\\OwnersController');

Route::resource('admin/accbanks', 'Admin\\AccbanksController');

Route::resource('admin/accounts', 'Admin\\AccountsController');
Route::resource('admin/det-accounts', 'Admin\\DetAccountsController');
//Route::resource('admin/account/detail', 'Admin\\AccountsController@viewDetail');
Route::resource('admin/categorys', 'Admin\\CategorysController');
Route::resource('admin/items', 'Admin\\ItemsController');
Route::resource('admin/destinations', 'Admin\\DestinationsController');
Route::resource('admin/options', 'Admin\\OptionsController');

Route::get('admin/getData/{date1}/{date2}', 'Admin\\AccountsController@getData');
Route::get('admin/getReportAll/{date1}/{date2}', 'Admin\\AccountsController@getReportAll');
Route::get('admin/report', 'Admin\\AccountsController@report');

Route::get('admin/getDebit/{id}','Admin\\AccountsController@getDebit');
Route::get('admin/getCredit/{id}','Admin\\AccountsController@getCredit');
Route::resource('admin/changes', 'Admin\\ChangesController');