<?php

Route::get('test', function () {
    $test = [
        3 => [
            5 => [2,4]
        ]
    ];
    dd(array_flatten($test));
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

//Frontend
Route::group(['namespace' => 'Front'], function() {
    Route::get('/', 'IndexController@index');

    Route::get('productos', 'ProductsController@index');
	Route::get('productos/search', 'ProductsController@search');
    Route::get('productos/{product}', 'ProductsController@show');
    Route::get('productos/{product}/get-stock', 'ProductsController@getStock');

    Route::get('carrito', 'CartController@show');
    Route::post('cart/add', 'CartController@add');
    Route::post('cart/remove', 'CartController@remove');
    Route::post('cart/refresh', 'CartController@refresh');
    Route::post('cart/buy', 'CartController@buy');

    Route::get('{category}', 'ProductsController@byCategory');
    Route::get('{category}/{subcategoria}', 'ProductsController@bySubcategory');
});
