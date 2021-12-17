<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
  Route::resource('clubs', 'App\Http\Controllers\Admin\ClubController');
  Route::get('club-list', 'App\Http\Controllers\Admin\ClubController@clubDataTable')->name('club-list');
  Route::get('club-select', 'App\Http\Controllers\Admin\ClubController@clubSelect')->name('club-select');
  Route::get('club-report', 'App\Http\Controllers\Admin\ClubController@report')->name('club.report');

  Route::resource('players', 'App\Http\Controllers\Admin\PlayerController');
  Route::get('player-list', 'App\Http\Controllers\Admin\PlayerController@playerDataTable')->name('player-list');
  Route::get('player-select', 'App\Http\Controllers\Admin\PlayerController@playerSelect')->name('player-select');
  Route::get('player-report', 'App\Http\Controllers\Admin\PlayerController@report')->name('players.report');


  Route::resource('profile','App\Http\Controllers\Admin\ProfileController');

  Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
  Route::get('/home/create', 'App\Http\Controllers\HomeController@create')->name('home.create');
  Route::post('/home', 'App\Http\Controllers\HomeController@store')->name('home.store');
  Route::get('/home/{home}/edit', 'App\Http\Controllers\HomeController@edit')->name('home.edit');
  Route::put('/home/{home}', 'App\Http\Controllers\HomeController@update')->name('home.update');
  Route::delete('/home/{home}', 'App\Http\Controllers\HomeController@destroy')->name('home.destroy');
  Route::post('/home/score', 'App\Http\Controllers\HomeController@score')->name('home.score');
  Route::get('home-report', 'App\Http\Controllers\HomeController@report')->name('home.report');
}); 