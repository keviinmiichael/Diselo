<?php

Route::get('/', function () {
    return view('welcome');
});

//Frontend
Route::group(['namespace' => 'Front'], function() {

});

//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'DashboardController@index');
});
