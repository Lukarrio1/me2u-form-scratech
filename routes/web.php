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

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Users','HomeController@Users')->name('Users');

Route::resource('settings','SettingsController');

Route::resource('profile','ProfileController');

Route::resource('Search','SearchController');

Route::resource('user','AddFriendController');

Route::resource('messaging','MessagingController');

Route::get('/send/{id}','MessagingController@send');

Route::resource('friend','FriendsController');

Route::get('/Sent','MessagingController@sent');