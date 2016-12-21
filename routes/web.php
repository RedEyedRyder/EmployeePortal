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


Auth::routes();

Route::get('/leave/apply', 'LeaveController@apply');
Route::post('/leave/apply', 'LeaveController@submit');
Route::get('/leave/overview', 'LeaveController@overview');

Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');
