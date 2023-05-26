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

$router->group(['prefix' => 's1'], function($router) {
    $router->get('/users', 'User1Controller@showUsers');
    $router->get('/users/{id}', 'User1Controller@showUser');
    $router->delete('/users/{id}', 'User1Controller@deleteUser');
    $router->post('/users', 'User1Controller@createUser');
    $router->patch('/users/{id}', 'User1Controller@patchUser');
});


$router->group(['prefix' => 's2'], function($router) {
    $router->get('/users', 'User2Controller@showUsers');
    $router->get('/users/{id}', 'User2Controller@showUser');
    $router->delete('/users/{id}', 'User2Controller@deleteUser');
    $router->post('/users', 'User2Controller@createUser');
    $router->patch('/users/{id}', 'User2Controller@patchUser');
});