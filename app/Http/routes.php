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
    return redirect('en/' . Lang::get('routes.products.index') );
});

Route::group(['prefix' => Localize::setLocale()], function ()
{
    // PRODUCTS
    // ---------------------------------------

    Route::get( '/', function()
    {
        return redirect( Localize::getCurrentLocale() . '/' . Lang::get('routes.products.index'));
    });

    Route::get( Localize::transRoute('routes.products.index'),    'ProductsController@index' );
    Route::get( Localize::transRoute('routes.products.edit'),     'ProductsController@edit' );
    Route::get( Localize::transRoute('routes.products.sections'), 'ProductsController@sections' );
    Route::get( Localize::transRoute('routes.products.sections') . '/{slug}', 'ProductsController@sections' );

    // CRUD
    Route::post(   'products/create', 'ProductsController@store' );
    Route::post(   'products/update', 'ProductsController@update' );
    Route::delete( 'products/delete/{id}', 'ProductsController@delete' );


    // SECTIONS
    // ---------------------------------------

    // CRUD
    Route::post( 'sections/create', 'SectionsController@store' );


    // PRINT
    // ---------------------------------------

    Route::get( Lang::get('routes.print'), 'PagesController@toPrint' );

});

// fix bug with localization package + parameter routes
Route::get( 'fr/products/sections/{slug}', 'ProductsController@sections' );
Route::get( 'en/produits/rayons/{slug}', 'ProductsController@sections' );


Route::get( 'auth/register', function()
{
    return redirect('auth/login');
});


Route::controllers(
[
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
