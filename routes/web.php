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

	 //clientes
    Route::get('clients/json', 'ClientsController@json');
    Route::resource('clients', 'ClientsController');

	 //compras
    Route::get('purchases/json', 'PurchasesController@json');
    Route::resource('purchases', 'PurchasesController');
});
