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

//user
$router->get('users', 'UserController@show');
$router->get('user/{id}', 'UserController@get');
$router->post('user', 'UserController@create');
$router->delete('user/{id}', 'UserController@delete');
$router->put('user', 'UserController@update');

//auth
$router->post('attempt', 'UserController@attempt');

//roles
$router->post('user/{id}/roles', 'RoleController@add');
$router->delete('user/{id}/roles', 'RoleController@delete');
