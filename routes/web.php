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

Route::get('/', 'PagesController@index');
Route::get('/logologic', 'PagesController@logologic');
Route::get('/settings', 'SettingsController@index');
Route::get('/spellbinders', 'PagesController@spellbinders');
Route::post('/update', 'SettingsController@update');
Route::get('/photofinish', 'PagesController@photofinish');
Route::get('/random', 'PagesController@random');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

