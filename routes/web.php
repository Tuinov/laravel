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
    Route::get('/news', 'NewsController@index')->name('home');
    Route::get('/news/{news}', 'NewsController@show')->name('show');
});

Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/category/{idCategory}', 'CategoryController@show')->name('category.show');

Route::group(['namespace' => 'Admin',
              'prefix' => 'admin',
              'as' => 'admin.',
            //  'middleware' => 'auth'
    ], function (){
    Route::resource('categories', 'CategoriesController');
});

Route::group(['namespace' => 'Admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    // 'middleware' => 'auth'
], function (){
    Route::resource('news', 'NewsController');

    Route::match(['get', 'post'], '/profile', [
        'uses' => 'ProfileController@update',
        'as' => 'updateProfile'
    ]);
});






//php artisan route:list

Auth::routes();

    // Authentication Routes...
//    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//    $this->post('login', 'Auth\LoginController@login');
//    $this->post('logout', 'Auth\LoginController@logout')->name('logout');




