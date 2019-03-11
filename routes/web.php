<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/item', 'ItemController@create');
$router->get('/item', 'ItemController@read');
$router->post('/item/{id}', 'ItemController@update');
$router->delete('/item/{id}', 'ItemController@delete');
$router->get('item/{id}', 'ItemController@detail');
