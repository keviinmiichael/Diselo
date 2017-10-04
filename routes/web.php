<?php

Auth::routes();

Route::get('test', function() {
    return bcrypt('123456');
});

// Authentication
Route::group(['namespace' => 'Auth', 'prefix' => 'admin'], function()
{
    Route::get('login', 'LoginController@showLoginForm');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');
});
//----------


//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/', 'DashboardController@index');

    //categorias
    Route::get('categories/json', 'CategoriesController@json');
    Route::resource('categories', 'CategoriesController');

    //subcategorias
    Route::get('subcategories/json', 'SubcategoriesController@json');
    Route::resource('categories.subcategories', 'SubcategoriesController');
    Route::get('subcategories/byCategory', 'SubcategoriesController@byCategory');

    //categorias
    Route::get('colors/json', 'ColorsController@json');
    Route::resource('colors', 'ColorsController');

    //productos
    Route::get('products/json', 'ProductsController@json');
    Route::resource('products', 'ProductsController');

    //stock
    Route::get('stock/create', 'StockController@create');
    Route::post('stock', 'StockController@store');

    //prices
    Route::get('precios', 'PricesController@create');
    Route::post('prices', 'PricesController@store');

	 //clientes
    Route::get('clients/json', 'ClientsController@json');
    Route::resource('clients', 'ClientsController');

	 //compras
    Route::get('purchases/json', 'PurchasesController@json');
    Route::get('items/json', 'PurchasesController@itemsToJson');
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
    Route::get('pedido-exitoso', 'CartController@success');
    Route::post('cart/add', 'CartController@add');
    Route::post('cart/remove', 'CartController@remove');
    Route::post('cart/refresh', 'CartController@refresh');
    Route::post('cart/buy', 'CartController@buy');

    //clientes
    Route::get('clients/login', 'ClientsController@getLogin');
    Route::post('clients/login', 'ClientsController@postLogin');
    Route::get('clients/logout', 'ClientsController@logout');
    Route::resource('clients', 'ClientsController');

    Route::get('contacto', 'ContactController@index');
    Route::post('contact/send', 'ContactController@send');
    Route::post('contact/send', 'ContactController@send');

    Route::get('localidades/byProvincia', 'LocalidadController@byProvincia');

    Route::get('{category}', 'ProductsController@byCategory');
    Route::get('{category}/{subcategoria}', 'ProductsController@bySubcategory');
});
