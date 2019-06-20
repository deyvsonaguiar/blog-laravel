<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth', 'admin']], function () {
   Route::get('dashboard', 'DashboardController@index')->name('dashboard');
   Route::resource('tag', 'TagController');
});

Route::group(['as' => 'author.','prefix' => 'author', 'namespace' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
