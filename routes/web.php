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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
