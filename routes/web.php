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
Route::get('/book/{bookId?}', 'BookDetailsInfoController@index')->name('book');
Route::post('/book/createReview', 'BookDetailsInfoController@createReview');
Route::post('/book/removeReview', 'BookDetailsInfoController@removeReview');
Route::get('/bookRegist', 'BookRegistrationController@show');
Route::post('/bookRegist', 'BookRegistrationController@create')->name('bookRegist');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
