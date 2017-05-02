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

/**
 * Convert some text to Markdown...
 */
function markdown($text)
{
    return (new ParsedownExtra)->text($text);
}

Route::get('/', 'DocsController@showRootPage');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', 'CartController@index');
    Route::get('/cart/add', 'CartController@add');
    Route::get('/cart/destroy', 'CartController@destroy');
    Route::get('/cart/fee', 'CartController@addFee');
});

Route::get('{version}/{page?}', 'DocsController@show');
Route::get('/home', 'HomeController@index');
