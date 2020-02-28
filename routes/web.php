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

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'admin',
    'as' => 'admin.'
], function() {
    Route::get('/admin/index', 'IndexController@index')->name('index');
    Route::get('/news/', 'NewsController@index')->name('news.index');
    Route::match(['post', 'get'],'/news/create', 'NewsController@create')->name('news.create');
    Route::match(['post', 'get'],'/news/update/{id}', 'NewsController@update')->name('news.update');
    Route::get('/categories/', 'CategoryController@index')->name('categories.index');
    Route::match(['post', 'get'],'/category/create', 'CategoryController@create')->name('category.create');
    Route::match(['post', 'get'],'/category/update/{id}', 'CategoryController@update')->name('category.update');
});

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function() {
    Route::get('/', 'NewsController@news')->name('all');
    Route::get('/categories', 'NewsController@categories')->name('categories');
    Route::get('/category/{id}', 'NewsController@categoryId')->name('categoryId');
    Route::get('/{id}', 'NewsController@newsOne')->name('newsOne');
});

Route::get('/contact', 'ContactController@index')->name('contact');

Auth::routes();
