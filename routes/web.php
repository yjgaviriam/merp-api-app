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

$router->group(['prefix' => 'api/v1'], function () use ($router) {

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
    });

    $router->post('login', [
        'as' => 'user.login', 'uses' => 'UserController@login'
    ]);
});
