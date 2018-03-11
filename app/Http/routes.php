<?php
Route::get('/', function () {
    return redirect('/home');
});

// Route::auth();
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home.index');
    Route::post('cart/{id}', 'HomeController@getAddToCart')->name('home.cart');
    Route::post('checkout', 'HomeController@postCheckout')->name('checkout');
    Route::post('cetak', 'HomeController@cetak')->name('cetak');

    Route::resource('categories', 'CategoryController');
    Route::post('categories_mass_destroy', ['uses' => 'CategoryController@massDestroy', 'as' => 'categories.mass_destroy']);
    Route::resource('products', 'ProductController');
    Route::post('products_mass_destroy', ['uses' => 'ProductController@massDestroy', 'as' => 'products.mass_destroy']);
    Route::resource('warehouses', 'WarehouseController', ['except' => ['create', 'show', 'destroy']]);
    // Route::post('warehouses_mass_destroy', ['uses' => 'WarehouseController@massDestroy', 'as' => 'warehouses.mass_destroy']);
    Route::get('reports', 'ReportController@index')->name('reports.index');
    Route::post('reports', 'ReportController@postReport')->name('reports.show');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::get('user_actions', 'UserActionsController@index')->name('user_actions.index');
});

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

});

/**
 * Testing area
 */
Route::get('test', function () {
    return view('reports.pdf');
});



