<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'possessions'], function() {
    
    Route::get('/', 'PossessionsController@index')->name('possessionsIndex');
    Route::get('/{possession}/show', 'PossessionsController@show')->name('possessionsShow');

    Route::get('/create', 'PossessionsController@create')->name('possessionsCreate');
    Route::post('/store', 'PossessionsController@store')->name('possessionsStore');

    Route::get('/{possession}/edit', 'PossessionsController@edit')->name('possessionsEdit');
    Route::match(['put', 'patch'], '/{possession}', 'PossessionsController@update')->name('possessionsUpdate');

    Route::get('/createportfolio', 'PortfoliosController@create')->name('portfolioCreate');
    Route::post('/storeportfolio', 'PortfoliosController@store')->name('portfolioStore');

    Route::delete('/{id}', 'PossessionsController@destroy');


});

