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

// авторизация через вконтакте
Route::get('/auth/vk', 'LoginController@loginVK')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@responseVK')->name('vkResponse');


Route::group(['prefix' => 'news'], function (){
    Route::get('/', 'NewsController@index')->name('home');
    Route::get('/{news}', 'NewsController@show')->name('show');
});

Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/category/{idCategory}', 'CategoryController@show')->name('category.show');



Route::group(['namespace' => 'Admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function (){
    Route::resource('news', 'NewsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('user', 'UserController');
    Route::get('user/role/{user}', 'UserController@userRoleToggle')
        ->name('userToggleRole');
    Route::get('parser', 'ParserController@index')
        ->name('parser');
});

Route::group(['prefix' => 'profile'], function (){
    Route::get('/edit', 'ProfileController@edit')->name('editProfile');
    Route::post('/update', 'ProfileController@update')->name('updateProfile');
});






//php artisan route:list

Auth::routes();

    // Authentication Routes...
//    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//    $this->post('login', 'Auth\LoginController@login');
//    $this->post('logout', 'Auth\LoginController@logout')->name('logout');




