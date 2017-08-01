<?php

Route::get('/', function () {
    return view('front.products.index');
});

//Frontend
Route::group(['namespace' => 'Front'], function() {
    Route::get('test', function () {
        return view('front.test');
    });
});

//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {

    Route::get('/', 'DashboardController@index');

    //categorias
    Route::get('categories/json', 'CategoriesController@json');
    Route::resource('categories', 'CategoriesController');

    //subcategorias
    Route::get('subcategories/json', 'SubcategoriesController@json');
    Route::resource('categories.subcategories', 'SubcategoriesController');

    //productos
    Route::get('products/json', 'ProductsController@json');
    Route::resource('products', 'ProductsController');

    //stock
    Route::get('stock/create', 'StockController@create');
    Route::post('stock', 'StockController@store');

	 //clientes
    Route::get('clients/json', 'ClientsController@json');
    Route::resource('clients', 'ClientsController');

	 //compras
    Route::get('purchases/json', 'PurchasesController@json');
    Route::resource('purchases', 'PurchasesController');

    //manejo de imagenes
    Route::post('images/upload', 'ImagesController@upload');
    Route::post('images/{image}/delete', 'ImagesController@destroy');

    //orden
    Route::post('sort/{table}', 'SortController@sort');
});
