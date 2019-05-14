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
    return 'Api MERP App';
});

// Rutas de primera version del api
$router->group(['prefix' => 'api/v1'], function () use ($router) {

    // Rutas para circuitos
    $router->group(['prefix' => 'circuits'], function () use ($router) {
        $router->get('', [
            'as' => 'circuits.index', 'uses' => 'CircuitController@index'
        ]);
        $router->post('create', [
            'as' => 'circuits.create', 'uses' => 'CircuitController@store'
        ]);
        $router->put('update', [
            'as' => 'circuits.update', 'uses' => 'CircuitController@update'
        ]);
        $router->delete('delete/{id}', [
            'as' => 'circuits.delete', 'uses' => 'CircuitController@destroy'
        ]);
    });

    // Rutas para empresas
    $router->group(['prefix' => 'enterprises'], function () use ($router) {
        $router->get('', [
            'as' => 'enterprises.index', 'uses' => 'EnterpriseController@index'
        ]);
    });

    // Rutas para roles
    $router->group(['prefix' => 'roles'], function () use ($router) {
        $router->get('', [
            'as' => 'roles.index', 'uses' => 'RoleController@index'
        ]);
    });

    // Rutas para subestaciones
    $router->group(['prefix' => 'substations'], function () use ($router) {
        $router->get('', [
            'as' => 'substations.index', 'uses' => 'SubstationController@index'
        ]);
        $router->post('create', [
            'as' => 'substations.create', 'uses' => 'SubstationController@store'
        ]);
        $router->put('update', [
            'as' => 'substations.update', 'uses' => 'SubstationController@update'
        ]);
        $router->delete('delete/{id}', [
            'as' => 'substations.delete', 'uses' => 'SubstationController@destroy'
        ]);
    });

    // Rutas para usuarios
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('', [
            'as' => 'users.index', 'uses' => 'UserController@index'
        ]);
        $router->post('create', [
            'as' => 'users.create', 'uses' => 'UserController@store'
        ]);
        $router->put('update', [
            'as' => 'users.update', 'uses' => 'UserController@update'
        ]);
        $router->delete('delete/{id}', [
            'as' => 'users.delete', 'uses' => 'UserController@destroy'
        ]);
    });

    // Ruta para login
    $router->post('login', [
        'as' => 'user.login', 'uses' => 'UserController@login'
    ]);
});
