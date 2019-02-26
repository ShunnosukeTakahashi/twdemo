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
   return view('welcome');
});

Auth::routes();

//Route::get('/' , 'TweetController@index');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/update' , 'TweetController@update');
Route::post('/tweet' , 'TweetController@store');


Route::get('/users' , 'UserController@index')->name('user_list');

Route::post('/users/follow/{follow_id}' , 'UserController@follow');


Route::post('/tweet/{id}' , 'TweetController@delete')->name('tweet_delete');

//Route::post('/public/images' , 'TweetController@preserve');

