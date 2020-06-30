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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('image_crop','ImageCropController@index');

Route::post('image_crop/upload', 'ImageCropController@upload')->name('image_crop.upload');



Route::group(['prefix' => 'profile'], function() {
    Route::get('/', 'UsersProfileController@edit')
        ->name('ProfileShow')
        ->middleware('can:show profile');
    Route::match(['put', 'patch'], '/', 'UsersProfileController@update')
        ->name('UsersProfileUpdate');


});

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
        
    Route::post('/update-items', array('as'=> 'update.items', 'uses' => 'PossessionsController@updateItems'));
    Route::post('/update-items', array('as'=> 'updateOwnerPossession', 'uses' => 'PossessionsController@updateOwnerPossession'));

    Route::get('/createportfolio', 'PortfoliosController@create')
        ->name('portfolioCreate')
        ->middleware('can:create portfolios');
    Route::post('/storeportfolio', 'PortfoliosController@store')
        ->name('portfolioStore')
        ->middleware('can:create portfolios');

    Route::delete('/{id}', 'PossessionsController@destroy')
        ->middleware('can:delete possessions');
});


Route::group(['prefix' => 'owners'], function() {  
    Route::get('/', 'OwnerController@index')
        ->name('ownersIndex')
        ->middleware('can:list owner');
    Route::get('/{owner}/show', 'OwnerController@show')
        ->name('ownerShow')
        ->middleware('can:show owner');

    Route::get('/create', 'OwnerController@create')
        ->name('ownerCreate')
        ->middleware('can:create owner');
    Route::post('/store', 'OwnerController@store')
        ->name('ownerStore')
        ->middleware('can:create owner');

    Route::get('/{owner}/edit', 'OwnerController@edit')
        ->name('ownerEdit')
        ->middleware('can:edit owner');
    Route::match(['put', 'patch'], '/{owner}', 'OwnerController@update')
        ->name('ownerUpdate')
        ->middleware('can:edit owner');

    Route::get('/create', 'OwnerController@create')
        ->name('ownerCreate')
        ->middleware('can:create owner');
    Route::post('/storeportfolio', 'OwnerController@store')
        ->name('ownerStore')
        ->middleware('can:create owner');

    Route::delete('/{id}', 'OwnerController@destroy')
        ->middleware('can:delete owner');
});