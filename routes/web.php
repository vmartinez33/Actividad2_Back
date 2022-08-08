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

Route::get('lang/{lang}', 'LanguageController')->name('lang.switch');

Route::get('/', function () {
    return view('welcome');
})->name('root');

Route::prefix('platforms')->group(function () {
    Route::match(['get', 'post'], '/', 'PlatformController@index')->name('platforms.index');
    Route::get('/create', 'PlatformController@create')->name('platforms.create');
    Route::post('/store', 'PlatformController@store')->name('platforms.store');
    Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    Route::delete('/{platform}/delete', 'PlatformController@delete')->name('platforms.delete');
});

Route::prefix('actors')->group(function () {
    Route::match(['get', 'post'], '/', 'ActorController@index')->name('actors.index');
    Route::get('/create', 'ActorController@create')->name('actors.create');
    Route::post('/store', 'ActorController@store')->name('actors.store');
    Route::get('/{actor}/edit', 'ActorController@edit')->name('actors.edit');
    Route::post('/{actor}/update', 'ActorController@update')->name('actors.update');
    Route::delete('/{actor}/delete', 'ActorController@delete')->name('actors.delete');
});

Route::prefix('directors')->group(function () {
    // Route::match(['get', 'post'], '/', 'PlatformController@index')->name('platforms.index');
    // Route::get('/create', 'PlatformController@create')->name('platforms.create');
    // Route::post('/store', 'PlatformController@store')->name('platforms.store');
    // Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    // Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    // Route::delete('/{platform}/delete', 'PlatformController@delete')->name('platforms.delete');
});

Route::prefix('languages')->group(function () {
    // Route::match(['get', 'post'], '/', 'PlatformController@index')->name('platforms.index');
    // Route::get('/create', 'PlatformController@create')->name('platforms.create');
    // Route::post('/store', 'PlatformController@store')->name('platforms.store');
    // Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    // Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    // Route::delete('/{platform}/delete', 'PlatformController@delete')->name('platforms.delete');
});

Route::prefix('series')->group(function () {
    // Route::match(['get', 'post'], '/', 'PlatformController@index')->name('platforms.index');
    // Route::get('/create', 'PlatformController@create')->name('platforms.create');
    // Route::post('/store', 'PlatformController@store')->name('platforms.store');
    // Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    // Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    // Route::delete('/{platform}/delete', 'PlatformController@delete')->name('platforms.delete');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
