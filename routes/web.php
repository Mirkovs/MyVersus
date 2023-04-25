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


//Rutas de cada pag asociado a un controlador

//HOME

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PagesController@index');
Route::get('/place', 'GpssController@index');
Route::get('/gestpost', 'GestpostController@index');
Route::get('/ranking', 'RankingController@index');
Route::get('/eventsvs', 'MatchController@show2');


// ADMIN
Route::get('/admin', 'AdminController@index');
Route::get('gestgpscontrol', 'GpssController@show');
Route::get('gestpointscontrol', 'RankingController@show');
Route::get('gestusercontrol', 'RankingController@index2');
Route::get('/gpsedit/{id}', 'GpssController@edit');
Route::get('/pointedit/{id}', 'RankingController@edit');
Route::get('/gestvscontrol', 'MatchController@show');


//RESOURCE
Route::resource('posts','PostsController');
Route::resource('gpss','GpssController');
Route::resource('users','RankingController');
Route::resource('match','MatchController');
Auth::routes();



