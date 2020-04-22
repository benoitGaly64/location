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
    
    Route::get('/', 'PossessionsController@index')
        ->name('possessionsIndex')
        ->middleware('can:list possessions');
    Route::get('/{possession}/show', 'PossessionsController@show')
        ->name('possessionsShow')
        ->middleware('can:show possessions');

    Route::get('/create', 'PossessionsController@create')
        ->name('possessionsCreate')
        ->middleware('can:create possessions');
    Route::post('/store', 'PossessionsController@store')
        ->name('possessionsStore')
        ->middleware('can:create possessions');

    Route::get('/{possession}/edit', 'PossessionsController@edit')
        ->name('possessionsEdit')
        ->middleware('can:edit possessions');
    Route::match(['put', 'patch'], '/{possession}', 'PossessionsController@update')
        ->name('possessionsUpdate')
        ->middleware('can:edit possessions');

    Route::get('/createportfolio', 'PortfoliosController@create')
        ->name('portfolioCreate')
        ->middleware('can:create portfolios');
    Route::post('/storeportfolio', 'PortfoliosController@store')
        ->name('portfolioStore')
        ->middleware('can:create portfolios');

    Route::delete('/{id}', 'PossessionsController@destroy')
        ->middleware('can:delete possessions');


});

