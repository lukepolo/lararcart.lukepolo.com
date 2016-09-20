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

Route::resource('cart', 'CartController');
Route::resource('cart/fee', 'CartFeeController');
Auth::routes();

Route::get('{version}/{page?}', 'DocsController@show');
Route::get('/home', 'HomeController@index');
