<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/api'], function (Router $router) {

	$router->post('suscriptoresSubmit', [
        'uses' => 'SuscriptoresApiController@suscriptoresSubmit',
        'as' => 'suscriptoresSubmit',
    ]);
});