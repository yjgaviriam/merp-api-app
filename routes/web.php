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

/*Route::resource('projects', 'ProjectController', [
    'only' => ['', '', 'update', 'show', 'destroy']
]);
*/
$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->group(['prefix' => 'substations'], function () use ($router) {
        $router->get('', [
            'as' => 'substations.index', 'uses' => 'SubstationController@index'
        ]);
        $router->post('create', [
            'as' => 'substations.create', 'uses' => 'SubstationController@store'
        ]);
    });

    $router->post('login', [
        'as' => 'user.login', 'uses' => 'UserController@login'
    ]);
});
