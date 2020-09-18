<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/eventos'], function (Router $router) {
    $router->bind('eventos', function ($id) {
        return app('Modules\Eventos\Repositories\EventosRepository')->find($id);
    });
    $router->get('eventos', [
        'as' => 'admin.eventos.eventos.index',
        'uses' => 'EventosController@index',
        'middleware' => 'can:eventos.eventos.index'
    ]);
    $router->get('eventos/create', [
        'as' => 'admin.eventos.eventos.create',
        'uses' => 'EventosController@create',
        'middleware' => 'can:eventos.eventos.create'
    ]);
    $router->post('eventos', [
        'as' => 'admin.eventos.eventos.store',
        'uses' => 'EventosController@store',
        'middleware' => 'can:eventos.eventos.store'
    ]);
    $router->get('eventos/{eventos}/edit', [
        'as' => 'admin.eventos.eventos.edit',
        'uses' => 'EventosController@edit',
        'middleware' => 'can:eventos.eventos.edit'
    ]);
    $router->put('eventos/{eventos}', [
        'as' => 'admin.eventos.eventos.update',
        'uses' => 'EventosController@update',
        'middleware' => 'can:eventos.eventos.update'
    ]);
    $router->delete('eventos/{eventos}', [
        'as' => 'admin.eventos.eventos.destroy',
        'uses' => 'EventosController@destroy',
        'middleware' => 'can:eventos.eventos.destroy'
    ]);
// append

});
