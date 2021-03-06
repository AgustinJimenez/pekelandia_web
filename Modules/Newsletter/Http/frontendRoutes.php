<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/api'], function (Router $router) {

	$router->post('newsletterSubmit', [
        'uses' => 'NewsletterApiController@newsletterSubmit',
        'as' => 'newsletterSubmit',
    ]);
});