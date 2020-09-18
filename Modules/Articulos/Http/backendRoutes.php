<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/articulos'], function (Router $router) {
    $router->bind('articulos', function ($id) {
        return app('Modules\Articulos\Repositories\ArticulosRepository')->find($id);
    });
    $router->get('articulos', [
        'as' => 'admin.articulos.articulos.index',
        'uses' => 'ArticulosController@index',
        'middleware' => 'can:articulos.articulos.index'
    ]);
    $router->get('articulos/create', [
        'as' => 'admin.articulos.articulos.create',
        'uses' => 'ArticulosController@create',
        'middleware' => 'can:articulos.articulos.create'
    ]);
    $router->post('articulos', [
        'as' => 'admin.articulos.articulos.store',
        'uses' => 'ArticulosController@store',
        'middleware' => 'can:articulos.articulos.store'
    ]);
    $router->get('articulos/{articulos}/edit', [
        'as' => 'admin.articulos.articulos.edit',
        'uses' => 'ArticulosController@edit',
        'middleware' => 'can:articulos.articulos.edit'
    ]);
    $router->put('articulos/{articulos}', [
        'as' => 'admin.articulos.articulos.update',
        'uses' => 'ArticulosController@update',
        'middleware' => 'can:articulos.articulos.update'
    ]);
    $router->delete('articulos/{articulos}', [
        'as' => 'admin.articulos.articulos.destroy',
        'uses' => 'ArticulosController@destroy',
        'middleware' => 'can:articulos.articulos.destroy'
    ]);
// append

});
