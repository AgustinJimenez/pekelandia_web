<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/anuncios'], function (Router $router) {
    $router->bind('anuncios', function ($id) {
        return app('Modules\Anuncios\Repositories\AnunciosRepository')->find($id);
    });
    $router->get('anuncios', [
        'as' => 'admin.anuncios.anuncios.index',
        'uses' => 'AnunciosController@index',
        'middleware' => 'can:anuncios.anuncios.index'
    ]);
    $router->get('anuncios/create', [
        'as' => 'admin.anuncios.anuncios.create',
        'uses' => 'AnunciosController@create',
        'middleware' => 'can:anuncios.anuncios.create'
    ]);
    $router->post('anuncios', [
        'as' => 'admin.anuncios.anuncios.store',
        'uses' => 'AnunciosController@store',
        'middleware' => 'can:anuncios.anuncios.store'
    ]);
    $router->get('anuncios/{anuncios}/edit', [
        'as' => 'admin.anuncios.anuncios.edit',
        'uses' => 'AnunciosController@edit',
        'middleware' => 'can:anuncios.anuncios.edit'
    ]);
    $router->put('anuncios/{anuncios}', [
        'as' => 'admin.anuncios.anuncios.update',
        'uses' => 'AnunciosController@update',
        'middleware' => 'can:anuncios.anuncios.update'
    ]);
    $router->delete('anuncios/{anuncios}', [
        'as' => 'admin.anuncios.anuncios.destroy',
        'uses' => 'AnunciosController@destroy',
        'middleware' => 'can:anuncios.anuncios.destroy'
    ]);
    $router->bind('galeria', function ($id) {
        return app('Modules\Anuncios\Repositories\GaleriaRepository')->find($id);
    });
    $router->get('galerias', [
        'as' => 'admin.anuncios.galeria.index',
        'uses' => 'GaleriaController@index',
        'middleware' => 'can:anuncios.galerias.index'
    ]);
    $router->get('galerias/create', [
        'as' => 'admin.anuncios.galeria.create',
        'uses' => 'GaleriaController@create',
        'middleware' => 'can:anuncios.galerias.create'
    ]);
    $router->post('galerias', [
        'as' => 'admin.anuncios.galeria.store',
        'uses' => 'GaleriaController@store',
        'middleware' => 'can:anuncios.galerias.store'
    ]);
    $router->get('galerias/{galeria}/edit', [
        'as' => 'admin.anuncios.galeria.edit',
        'uses' => 'GaleriaController@edit',
        'middleware' => 'can:anuncios.galerias.edit'
    ]);
    $router->put('galerias/{galeria}', [
        'as' => 'admin.anuncios.galeria.update',
        'uses' => 'GaleriaController@update',
        'middleware' => 'can:anuncios.galerias.update'
    ]);
    $router->delete('galerias/{galeria}', [
        'as' => 'admin.anuncios.galeria.destroy',
        'uses' => 'GaleriaController@destroy',
        'middleware' => 'can:anuncios.galerias.destroy'
    ]);
    $router->bind('publicidad', function ($id) {
        return app('Modules\Anuncios\Repositories\PublicidadRepository')->find($id);
    });
    $router->get('publicidads', [
        'as' => 'admin.anuncios.publicidad.index',
        'uses' => 'PublicidadController@index',
        'middleware' => 'can:anuncios.publicidads.index'
    ]);
    $router->get('publicidads/create', [
        'as' => 'admin.anuncios.publicidad.create',
        'uses' => 'PublicidadController@create',
        'middleware' => 'can:anuncios.publicidads.create'
    ]);
    $router->post('publicidads', [
        'as' => 'admin.anuncios.publicidad.store',
        'uses' => 'PublicidadController@store',
        'middleware' => 'can:anuncios.publicidads.store'
    ]);
    $router->get('publicidads/{publicidad}/edit', [
        'as' => 'admin.anuncios.publicidad.edit',
        'uses' => 'PublicidadController@edit',
        'middleware' => 'can:anuncios.publicidads.edit'
    ]);
    $router->put('publicidads/{publicidad}', [
        'as' => 'admin.anuncios.publicidad.update',
        'uses' => 'PublicidadController@update',
        'middleware' => 'can:anuncios.publicidads.update'
    ]);
    $router->delete('publicidads/{publicidad}', [
        'as' => 'admin.anuncios.publicidad.destroy',
        'uses' => 'PublicidadController@destroy',
        'middleware' => 'can:anuncios.publicidads.destroy'
    ]);
    $router->bind('suscriptores', function ($id) {
        return app('Modules\Anuncios\Repositories\SuscriptoresRepository')->find($id);
    });
    $router->get('suscriptores', [
        'as' => 'admin.anuncios.suscriptores.index',
        'uses' => 'SuscriptoresController@index',
        'middleware' => 'can:anuncios.suscriptores.index'
    ]);
    $router->get('suscriptores/create', [
        'as' => 'admin.anuncios.suscriptores.create',
        'uses' => 'SuscriptoresController@create',
        'middleware' => 'can:anuncios.suscriptores.create'
    ]);
    $router->post('suscriptores', [
        'as' => 'admin.anuncios.suscriptores.store',
        'uses' => 'SuscriptoresController@store',
        'middleware' => 'can:anuncios.suscriptores.store'
    ]);
    $router->get('suscriptores/{suscriptores}/edit', [
        'as' => 'admin.anuncios.suscriptores.edit',
        'uses' => 'SuscriptoresController@edit',
        'middleware' => 'can:anuncios.suscriptores.edit'
    ]);
    $router->put('suscriptores/{suscriptores}', [
        'as' => 'admin.anuncios.suscriptores.update',
        'uses' => 'SuscriptoresController@update',
        'middleware' => 'can:anuncios.suscriptores.update'
    ]);
    $router->delete('suscriptores/{suscriptores}', [
        'as' => 'admin.anuncios.suscriptores.destroy',
        'uses' => 'SuscriptoresController@destroy',
        'middleware' => 'can:anuncios.suscriptores.destroy'
    ]);
// append




});
