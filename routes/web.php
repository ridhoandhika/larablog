<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontendController@index')->name('index');

Route::group(['prefix'=> 'admin','middleware' =>'auth'], function(){


Route::get('/categories','CategoryController@index')->name('categories');
Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category/store','CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::post('/category/update/{id}','CategoryController@update')->name('category.update');
 Route::get('/category/delete/{id}','CategoryController@delete')->name('category.delete');
//Route::delete('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');

Route::get('/posts','PostController@index')->name('post');
Route::get('/posts/create','PostController@create')->name('post.create');
Route::post('/posts/store','PostController@store')->name('post.store');
Route::get('/posts/edit/{id}','PostController@edit')->name('post.edit');
Route::post('/posts/update/{id}','PostController@update')->name('post.update');
Route::get('/posts/trash/{id}','PostController@trash')->name('post.trash');
Route::get('/posts/trashed','PostController@trashed')->name('post.trashed');
Route::get('/posts/restore/{id}','PostController@restore')->name('post.restore');
Route::get('/posts/delete/{id}','PostController@delete')->name('post.delete');

Route::get('/tags','TagController@index')->name('tags');
Route::get('/tag/create','TagController@create')->name('tag.create');
Route::post('/tag/store','TagController@store')->name('tag.store');
Route::get('/tag/edit/{id}','TagController@edit')->name('tag.edit');
Route::post('/tag/update/{id}','TagController@update')->name('tag.update');
Route::get('/tag/delete/{id}','TagController@delete')->name('tag.delete');

Route::get('/users','UserController@index')->name('users');
Route::get('/user/create','UserController@create')->name('user.create');
Route::post('/user/store','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{id}','UserController@update')->name('user.update');
Route::get('/user/delete/{id}','UserController@delete')->name('user.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
