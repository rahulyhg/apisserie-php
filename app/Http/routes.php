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

Route::get( '/', function()
{
  return redirect('products');
});

Route::group(['prefix' => 'products'], function()
{
  Route::get(  '/',      'ProductsController@index' );
  Route::post( 'create', 'ProductsController@store' );
});

Route::group(['prefix' => 'sections'], function()
{
  Route::get(  '/',      'SectionsController@index' );
  Route::post( 'create', 'SectionsController@store' );
});

Route::get( 'print', 'PagesController@toPrint' );


Route::get( 'auth/register', function()
{
  return redirect('auth/login');
});

Route::controllers(
[
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
