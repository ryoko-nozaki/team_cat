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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/loan', 'LoanController@index')->name('loan');
Route::post('/loan', 'LoanController@index')->name('loan');
Route::get('/mypage', 'mypageController@index')->name('mypage');
Route::post('/mypage', 'mypageController@index')->name('mypage');

Route::get('/', 'SearchController@index')->middleware('auth');
Route::get('search', 'SearchController@index')->middleware('auth');

Route::get('/book/{bookId?}', 'BookDetailsInfoController@index')->name('book');
Route::post('/book/createReview', 'BookDetailsInfoController@createReview');
Route::post('/book/removeReview', 'BookDetailsInfoController@removeReview');
Route::get('/bookRegist', 'BookRegistrationController@show');
Route::post('/bookRegist', 'BookRegistrationController@create')->name('bookRegist');
Route::get('/searchBook', 'BookSearchController@show');
