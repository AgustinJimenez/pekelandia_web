<?php

use Illuminate\Routing\Router;

/** @var Router $router */
if (! App::runningInConsole()) {
    $router->get('/', [
        'uses' => 'PublicController@homepage',
        'as' => 'homepage',
        'middleware' => config('asgard.page.config.middleware'),
    ]);

    $router->get('empresas', [
        'uses' => 'PublicController@empresas'
    ]);

    $router->get('revistas', [
        'uses' => 'PublicController@revistas'
    ]);

    $router->get('eventos', [
        'uses' => 'PublicController@eventos'
    ]);

    $router->get('promociones', [
        'uses' => 'PublicController@promociones'
    ]);

    $router->get('articulos', [
        'uses' => 'PublicController@articulos'
    ]);

    $router->get('singlepost', [
        'uses' => 'PublicController@singlepost'
    ]);

    /* /4/2/all */
    $router->get('filter/{categoria_id}/{pais_id}/{ciudad_id}', [
        'as' => 'filter',
        'uses' => 'PublicController@filtroEmpresas'
    ]);

    $router->get('videos', [
        'uses' => 'PublicController@videos'
    ]);

    $router->post('newsletter', [
        'uses' => 'PublicController@newsletter'
    ]);

    $router->get('sumatunegocio', [
        'uses' => 'PublicController@sumaTuNegocio'
    ]);

    $router->get('formulario', [
        'uses' => 'PublicController@formulario'
    ]);

    $router->get('search', [
        'as' => 'searchFilter',
        'uses' => 'PublicController@searchFilter',
    ]);

    /**Route::get('auth/facebook', 'PageSocialController@redirectToProvider')->name('facebook.login');
    Route::get('auth/facebook/callback', 'PageSocialController@handleProviderCallback');**/
    
    $router->any('{uri}', [
        'uses' => 'PublicController@uri',
        'as' => 'page',
        'middleware' => config('asgard.page.config.middleware'),
    ])->where('uri', '.*');
}



