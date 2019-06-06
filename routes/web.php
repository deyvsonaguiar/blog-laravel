<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth', 'admin']], function () {
   Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['as' => 'author.','prefix' => 'author', 'namespace' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
