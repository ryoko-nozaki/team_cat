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

Route::get('/loan', 'LoanController@index')->name('loan');
Route::post('/loan', 'LoanController@register')->name('loan');
Route::get('/mypage', 'MypageController@index')->name('mypage');

Route::get('/', 'SearchController@index')->middleware('auth');
Route::get('/search', 'SearchController@index')->middleware('auth');
Route::get('/applying', 'ApplyingController@index')->middleware('auth')->name('applying');
Route::post('/applying', 'ApplyingController@register')->middleware('auth');
