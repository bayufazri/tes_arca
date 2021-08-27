<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('layouts.master');
// });

Route::prefix('bonus')->name('bonus.')->group(function(){
    Route::get('/','BonusController@index')->name('index');
    Route::get('/create', 'BonusController@create')->name('create');
    Route::post('/store', 'BonusController@store')->name('store');
    Route::get('/edit/{bonus}', 'BonusController@edit')->name('edit');
    Route::get('/show/{bonus}', 'BonusController@show')->name('show');
    Route::put('/update/{bonus}', 'BonusController@update')->name('update');
    Route::delete('/delete/{bonus}', 'BonusController@destroy')->name('destroy');
});