<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')
->namespace('App\Http\Controllers\Dashboard')
->prefix('admin')
->group(function () {

               // Basic Routes//

 Route::get('/home','HomeController@index')->name('home');
 Route::get('/search','HomeController@search')->name('search');
 Route::get('/profile','ProfileController@show')->name('profile.show');
 Route::get('/profile/edit','ProfileController@edit')->name('profile.edit');
 Route::put('/profile/update/{id}','ProfileController@update')->name('profile.update');

               // Users Routes//
 Route::get('/users','UserController@index')->name('users.index');
 Route::get('/users/create','UserController@create')->name('users.create');
 Route::post('/users/store','UserController@store')->name('users.store');
 Route::get('/users/edit/{id}','UserController@edit')->name('users.edit');
 Route::get('/users/show/{id}','UserController@show')->name('users.show');
 Route::put('/users/update/{id}','UserController@update')->name('users.update');
 Route::delete('/users/destroy/{id}','UserController@destroy')->name('users.destroy');

 Route::delete('/albums/{album}/delete-pictures', 'AlbumController@deletePictures')
 ->name('albums.delete-pictures');
 Route::resource('albums','AlbumController');


});

Auth::routes();

