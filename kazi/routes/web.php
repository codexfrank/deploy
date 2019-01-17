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

//homepage route
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

//student route
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//teacher page route
Route::get('/teacher', 'HomeController@students')->middleware('verified');

//admin page route
Route::get('/admin', 'HomeController@teachers')->middleware('verified');

//students page route
Route::get('/students', 'HomeController@students')->name('students')->middleware('verified');

//teachers page route
Route::get('/teachers', 'HomeController@teachers')->name('teachers')->middleware('verified');

