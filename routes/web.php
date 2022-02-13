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

$router->get('users', 'UserController@show');
$router->get('users/{id}', 'UserController@get');
$router->post('users', 'UserController@create');
$router->delete('users/{id}', 'UserController@delete');
$router->put('users', 'UserController@update');
$router->post('users/attempt', 'UserController@attempt');

$router->post('users/{id}/roles', 'RoleController@add');
$router->delete('users/{id}/roles', 'RoleController@delete');
