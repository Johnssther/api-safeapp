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

$router->post('login', 'Auth\LoginController@login');
$router->post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () use ($router) { //middleware

    $router->get('users', 'UserController@index');
    $router->get('rounds', 'RoundController@index');
    $router->post('rounds', 'RoundController@store');

});