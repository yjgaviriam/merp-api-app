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

    // Rutas para municipios
    $router->group(['prefix' => 'cities'], function () use ($router) {
        $router->get('', [
            'as' => 'cities.index', 'uses' => 'CitiesController@index'
        ]);
        $router->post('create', [
            'as' => 'cities.create', 'uses' => 'CitiesController@store'
        ]);
        $router->put('update', [
            'as' => 'cities.update', 'uses' => 'CitiesController@update'
        ]);
        $router->delete('delete/{id}', [
            'as' => 'cities.delete', 'uses' => 'CitiesController@destroy'
        ]);
    });

    // Rutas para contratos
    $router->group(['prefix' => 'contracts'], function () use ($router) {
        $router->get('', [
            'as' => 'contracts.index', 'uses' => 'ContractController@index'
        ]);
        $router->post('create', [
            'as' => 'contracts.create', 'uses' => 'ContractController@store'
        ]);
        $router->put('update', [
            'as' => 'contracts.update', 'uses' => 'ContractController@update'
        ]);
        $router->delete('delete/{id}', [
            'as' => 'contracts.delete', 'uses' => 'ContractController@destroy'
        ]);
    });

    // Rutas para departamentos
    $router->group(['prefix' => 'departments'], function () use ($router) {
        $router->get('', [
            'as' => 'departments.index', 'uses' => 'DepartmentController@index'
        ]);
    });

    // Rutas para empresas
    $router->group(['prefix' => 'enterprises'], function () use ($router) {
        $router->get('', [
            'as' => 'enterprises.index', 'uses' => 'EnterpriseController@index'
        ]);
        $router->post('create', [
            'as' => 'enterprises.create', 'uses' => 'EnterpriseController@store'
        ]);
        $router->put('update', [
            'as' => 'enterprises.update', 'uses' => 'EnterpriseController@update'
        ]);
        $router->delete('delete/{id}', [
            'as' => 'enterprises.delete', 'uses' => 'EnterpriseController@destroy'
        ]);
    });

    // Rutas para proyectos
    $router->group(['prefix' => 'projects'], function () use ($router) {
        $router->get('', [
            'as' => 'projects.index', 'uses' => 'ProjectController@index'
        ]);
        $router->get('by-user/{userId}', [
            'as' => 'projects.index.users', 'uses' => 'ProjectController@indexByUser'
        ]);
        $router->get('download/{code}/user/{userId}', [
            'as' => 'projects.index.users', 'uses' => 'ProjectController@download'
        ]);
        $router->post('create', [
            'as' => 'projects.create', 'uses' => 'ProjectController@store'
        ]);
        $router->put('update', [
            'as' => 'projects.update', 'uses' => 'ProjectController@update'
        ]);
        $router->delete('delete/{id}', [
            'as' => 'projects.delete', 'uses' => 'ProjectController@destroy'
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

    // Rutas para tipos de red
    $router->group(['prefix' => 'type-networks'], function () use ($router) {
        $router->get('', [
            'as' => 'type.networks.index', 'uses' => 'TypeNetworkController@index'
        ]);
    });

    // Rutas para tipos de localidad
    $router->group(['prefix' => 'type-towns'], function () use ($router) {
        $router->get('', [
            'as' => 'type.towns.index', 'uses' => 'TypeTownController@index'
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
