<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/empresa'], function (Router $router) {
    $router->bind('empresa', function ($id) {
        return app('Modules\Empresa\Repositories\EmpresaRepository')->find($id);
    });
    $router->get('empresas', [
        'as' => 'admin.empresa.empresa.index',
        'uses' => 'EmpresaController@index',
        'middleware' => 'can:empresa.empresas.index'
    ]);
    $router->get('empresas/create', [
        'as' => 'admin.empresa.empresa.create',
        'uses' => 'EmpresaController@create',
        'middleware' => 'can:empresa.empresas.create'
    ]);
    $router->post('empresas', [
        'as' => 'admin.empresa.empresa.store',
        'uses' => 'EmpresaController@store',
        'middleware' => 'can:empresa.empresas.store'
    ]);
    $router->get('empresas/{empresa}/edit', [
        'as' => 'admin.empresa.empresa.edit',
        'uses' => 'EmpresaController@edit',
        'middleware' => 'can:empresa.empresas.edit'
    ]);
    $router->put('empresas/{empresa}', [
        'as' => 'admin.empresa.empresa.update',
        'uses' => 'EmpresaController@update',
        'middleware' => 'can:empresa.empresas.update'
    ]);
    $router->delete('empresas/{empresa}', [
        'as' => 'admin.empresa.empresa.destroy',
        'uses' => 'EmpresaController@destroy',
        'middleware' => 'can:empresa.empresas.destroy'
    ]);
// append
    
});
