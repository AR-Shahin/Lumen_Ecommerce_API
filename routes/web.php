<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\CategoryController;

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });
    //Category
    $router->get('/categories', 'CategoryController@index');
    $router->post('/categories', 'CategoryController@store');
    $router->get('/categories/{id}', 'CategoryController@show');
    $router->put('/categories/{id}', 'CategoryController@update');
    $router->delete('/categories/{id}', 'CategoryController@destroy');

    //Product
    $router->get('/products', 'ProductController@index');
    $router->post('/products', 'ProductController@store');
    $router->get('/products/{id}', 'ProductController@show');
    $router->put('/products/{id}', 'ProductController@update');
    $router->delete('/products/{id}', 'ProductController@destroy');
});


