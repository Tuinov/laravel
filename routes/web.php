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

Route::get('/','NewsController@index');


Route::group([], function (){
    //Route::get('/news', 'NewsController@index');
    Route::get('/news/{id}', 'NewsController@show')->name('show');
});

Route::get('/categories', 'CategoryController@index');
Route::get('/category/{idCategory}', 'CategoryController@show')->name('category.show');

//Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
//    Route::resource('news', 'NewsController');
//});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('categories', 'CategoriesController');
});

//php artisan route:list

Auth::routes();

Route::get('/home', 'NewsController@index')->name('home');
