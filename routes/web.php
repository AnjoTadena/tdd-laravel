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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/threads', 'ThreadController');
// Route::get('/threads', 'ThreadController@index')->name('threads.index');
// Route::post('/threads', 'ThreadController@store')->name('threads.store');
// Route::post('/threads', 'ThreadController@store')->name('threads.store');
// Route::get('/threads/{thread}', 'ThreadController@show')->name('threads.show');
Route::post('/threads/{thread}/replies', 'ReplyController@store')->name('replies.store');
