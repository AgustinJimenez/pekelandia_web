<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/paises'], function (Router $router) {
    $router->bind('pais', function ($id) {
        return app('Modules\Paises\Repositories\PaisRepository')->find($id);
    });
    $router->get('pais', [
        'as' => 'admin.paises.pais.index',
        'uses' => 'PaisController@index',
        'middleware' => 'can:paises.pais.index'
    ]);
    $router->get('pais/create', [
        'as' => 'admin.paises.pais.create',
        'uses' => 'PaisController@create',
        'middleware' => 'can:paises.pais.create'
    ]);
    $router->post('pais', [
        'as' => 'admin.paises.pais.store',
        'uses' => 'PaisController@store',
        'middleware' => 'can:paises.pais.store'
    ]);
    $router->get('pais/{pais}/edit', [
        'as' => 'admin.paises.pais.edit',
        'uses' => 'PaisController@edit',
        'middleware' => 'can:paises.pais.edit'
    ]);
    $router->put('pais/{pais}', [
        'as' => 'admin.paises.pais.update',
        'uses' => 'PaisController@update',
        'middleware' => 'can:paises.pais.update'
    ]);
    $router->delete('pais/{pais}', [
        'as' => 'admin.paises.pais.destroy',
        'uses' => 'PaisController@destroy',
        'middleware' => 'can:paises.pais.destroy'
    ]);

    // Index Categorias
    $router->get('pais/indexPaises', [
        'as' => 'admin.categoria.categoria.indexPaises',
        'uses' => 'PaisController@indexPaises',
        'middleware' => 'can:paises.pais.index'
    ]);

    $router->bind('ciudad', function ($id) {
        return app('Modules\Paises\Repositories\CiudadRepository')->find($id);
    });
    $router->get('ciudads', [
        'as' => 'admin.paises.ciudad.index',
        'uses' => 'CiudadController@index',
        'middleware' => 'can:paises.ciudads.index'
    ]);
    $router->get('ciudads/create', [
        'as' => 'admin.paises.ciudad.create',
        'uses' => 'CiudadController@create',
        'middleware' => 'can:paises.ciudads.create'
    ]);
    $router->post('ciudads', [
        'as' => 'admin.paises.ciudad.store',
        'uses' => 'CiudadController@store',
        'middleware' => 'can:paises.ciudads.store'
    ]);
    $router->get('ciudads/{ciudad}/edit', [
        'as' => 'admin.paises.ciudad.edit',
        'uses' => 'CiudadController@edit',
        'middleware' => 'can:paises.ciudads.edit'
    ]);
    $router->put('ciudads/{ciudad}', [
        'as' => 'admin.paises.ciudad.update',
        'uses' => 'CiudadController@update',
        'middleware' => 'can:paises.ciudads.update'
    ]);
    $router->delete('ciudads/{ciudad}', [
        'as' => 'admin.paises.ciudad.destroy',
        'uses' => 'CiudadController@destroy',
        'middleware' => 'can:paises.ciudads.destroy'
    ]);
// append


});
