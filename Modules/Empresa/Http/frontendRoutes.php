<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/api'], function (Router $router) {

	$router->post('tieneHijos', [
        'uses' => 'EmpresaApiController@tieneHijos',
    ]);
});