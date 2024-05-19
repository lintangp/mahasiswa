<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->get('/', 'StudentController@index');
    $router->get('/{id}', 'StudentController@show');
    $router->post('/', 'StudentController@store');
    $router->put('/{id}', 'StudentController@update');
    $router->delete('/{id}', 'StudentController@destroy');
});

