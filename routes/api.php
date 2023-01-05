<?php

Route::post('/sanctum/token', 'Api\Auth\AuthClientController@auth');


Route::group([
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('/auth/me', 'Api\Auth\AuthClientController@me');
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    Route::get('/tenants/{uuid}', 'Api\TenantApiController@show');
    Route::get('/tenants', 'Api\TenantApiController@index');

    Route::get('/categories/{url}', 'Api\CategoryApiController@show');
    Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'Api\TableApiController@show');
    Route::get('/tables', 'Api\TableApiController@tablesByTenant');

    Route::get('/products/{flag}', 'Api\ProductApiController@show');
    Route::get('/products', 'Api\ProductApiController@productsByTenant');

    Route::post('/client', 'Auth\RegisterController@store');

});
