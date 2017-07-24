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

    //categorias
    Route::get('categories/json', 'CategoriesController@json');
    Route::resource('categories', 'CategoriesController');

    //productos
    Route::get('products/json', 'ProductsController@json');
    Route::resource('products', 'ProductsController');

    //manejo de imagenes
    Route::post('images/upload', 'ImagesController@upload');
    Route::post('images/{image}/delete', 'ImagesController@destroy');

    //orden
    Route::post('sort/{table}', 'SortController@sort');
});
