<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/promociones'], function (Router $router) {
    $router->bind('promociones', function ($id) {
        return app('Modules\Promociones\Repositories\PromocionesRepository')->find($id);
    });
    $router->get('promociones', [
        'as' => 'admin.promociones.promociones.index',
        'uses' => 'PromocionesController@index',
        'middleware' => 'can:promociones.promociones.index'
    ]);
    $router->get('promociones/create', [
        'as' => 'admin.promociones.promociones.create',
        'uses' => 'PromocionesController@create',
        'middleware' => 'can:promociones.promociones.create'
    ]);
    $router->post('promociones', [
        'as' => 'admin.promociones.promociones.store',
        'uses' => 'PromocionesController@store',
        'middleware' => 'can:promociones.promociones.store'
    ]);
    $router->get('promociones/{promociones}/edit', [
        'as' => 'admin.promociones.promociones.edit',
        'uses' => 'PromocionesController@edit',
        'middleware' => 'can:promociones.promociones.edit'
    ]);
    $router->put('promociones/{promociones}', [
        'as' => 'admin.promociones.promociones.update',
        'uses' => 'PromocionesController@update',
        'middleware' => 'can:promociones.promociones.update'
    ]);
    $router->delete('promociones/{promociones}', [
        'as' => 'admin.promociones.promociones.destroy',
        'uses' => 'PromocionesController@destroy',
        'middleware' => 'can:promociones.promociones.destroy'
    ]);
// append

});
