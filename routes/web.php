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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>'heroes'], function(){
	Route::resource('hero','HeroesController');
});

Route::get('play', 'PlayController@getData')->name('play');

Route::get('play/enemies', 'PlayController@getEnemies')->name('play');

Route::get('play/heroUpdate', 'PlayController@heroUpdate');

Route::get('play/saveLog', 'PlayController@heroUpdate');

Route::get('logs', 'LogsController@getData')->name('logs');

Route::get('logs/delete', 'LogsController@heroUpdate');

// Route::get('logs', function () {
//     return view('logs');
// });
