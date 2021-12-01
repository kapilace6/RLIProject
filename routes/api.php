<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Fetch Driver & Constructor Details - Telemetry API
Route::get('/drivers/data','DriverController@driverdata')->name('telemetry.drivers');
Route::post('/report/submit','ReportsController@bulkCreate')->name('steward.upload');

// Fetch User Info - Discord Bot
Route::get('/users/details/{query}/{id}','BotController@fetchdetails')->name('bot.discord');
Route::get('/users/driver/fetch/{id}','BotController@fetchDriverId')->name('bot.driverid');

// Upload Race Results
Route::post('/results/race', 'ResultsController@saveRaceResults')->name('result.upload');

Route::get('/fetch/drivers/{race}','ReportsController@driversdata');

// Signups
Route::get('/signups', 'SignupsController@index')->name('signups.index');
Route::get('/signups/{season_id}', 'SignupsController@show')->name('signups.show');