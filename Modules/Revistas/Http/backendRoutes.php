<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/revistas'], function (Router $router) {
    $router->bind('revistas', function ($id) {
        return app('Modules\Revistas\Repositories\RevistasRepository')->find($id);
    });
    $router->get('revistas', [
        'as' => 'admin.revistas.revistas.index',
        'uses' => 'RevistasController@index',
        'middleware' => 'can:revistas.revistas.index'
    ]);
    $router->get('revistas/create', [
        'as' => 'admin.revistas.revistas.create',
        'uses' => 'RevistasController@create',
        'middleware' => 'can:revistas.revistas.create'
    ]);
    $router->post('revistas', [
        'as' => 'admin.revistas.revistas.store',
        'uses' => 'RevistasController@store',
        'middleware' => 'can:revistas.revistas.store'
    ]);
    $router->get('revistas/{revistas}/edit', [
        'as' => 'admin.revistas.revistas.edit',
        'uses' => 'RevistasController@edit',
        'middleware' => 'can:revistas.revistas.edit'
    ]);
    $router->put('revistas/{revistas}', [
        'as' => 'admin.revistas.revistas.update',
        'uses' => 'RevistasController@update',
        'middleware' => 'can:revistas.revistas.update'
    ]);
    $router->delete('revistas/{revistas}', [
        'as' => 'admin.revistas.revistas.destroy',
        'uses' => 'RevistasController@destroy',
        'middleware' => 'can:revistas.revistas.destroy'
    ]);
// append

});
