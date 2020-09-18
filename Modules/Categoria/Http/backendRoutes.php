<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/categoria'], function (Router $router) {
    $router->bind('categoria', function ($id) {
        return app('Modules\Categoria\Repositories\CategoriaRepository')->find($id);
    });
    $router->get('categorias', [
        'as' => 'admin.categoria.categoria.index',
        'uses' => 'CategoriaController@index',
        'middleware' => 'can:categoria.categorias.index'
    ]);
    $router->get('categorias/create', [
        'as' => 'admin.categoria.categoria.create',
        'uses' => 'CategoriaController@create',
        'middleware' => 'can:categoria.categorias.create'
    ]);
    $router->post('categorias', [
        'as' => 'admin.categoria.categoria.store',
        'uses' => 'CategoriaController@store',
        'middleware' => 'can:categoria.categorias.store'
    ]);
    $router->get('categorias/{categoria}/edit', [
        'as' => 'admin.categoria.categoria.edit',
        'uses' => 'CategoriaController@edit',
        'middleware' => 'can:categoria.categorias.edit'
    ]);
    $router->put('categorias/{categoria}', [
        'as' => 'admin.categoria.categoria.update',
        'uses' => 'CategoriaController@update',
        'middleware' => 'can:categoria.categorias.update'
    ]);
    $router->delete('categorias/{categoria}', [
        'as' => 'admin.categoria.categoria.destroy',
        'uses' => 'CategoriaController@destroy',
        'middleware' => 'can:categoria.categorias.destroy'
    ]);

    // Index Categorias
    $router->get('categorias/indexCategorias', [
        'as' => 'admin.categoria.categoria.indexCategorias',
        'uses' => 'CategoriaController@indexCategorias',
        'middleware' => 'can:categoria.categorias.index'
    ]);

    $router->bind('subcategoria', function ($id) {
        return app('Modules\Categoria\Repositories\SubcategoriaRepository')->find($id);
    });
    $router->get('subcategorias', [
        'as' => 'admin.categoria.subcategoria.index',
        'uses' => 'SubcategoriaController@index',
        'middleware' => 'can:categoria.subcategorias.index'
    ]);
    $router->get('subcategorias/create', [
        'as' => 'admin.categoria.subcategoria.create',
        'uses' => 'SubcategoriaController@create',
        'middleware' => 'can:categoria.subcategorias.create'
    ]);
    $router->post('subcategorias', [
        'as' => 'admin.categoria.subcategoria.store',
        'uses' => 'SubcategoriaController@store',
        'middleware' => 'can:categoria.subcategorias.store'
    ]);
    $router->get('subcategorias/{subcategoria}/edit', [
        'as' => 'admin.categoria.subcategoria.edit',
        'uses' => 'SubcategoriaController@edit',
        'middleware' => 'can:categoria.subcategorias.edit'
    ]);
    $router->put('subcategorias/{subcategoria}', [
        'as' => 'admin.categoria.subcategoria.update',
        'uses' => 'SubcategoriaController@update',
        'middleware' => 'can:categoria.subcategorias.update'
    ]);
    $router->delete('subcategorias/{subcategoria}', [
        'as' => 'admin.categoria.subcategoria.destroy',
        'uses' => 'SubcategoriaController@destroy',
        'middleware' => 'can:categoria.subcategorias.destroy'
    ]);
    $router->bind('subsubcategoria', function ($id) {
        return app('Modules\Categoria\Repositories\SubsubcategoriaRepository')->find($id);
    });
    $router->get('subsubcategorias', [
        'as' => 'admin.categoria.subsubcategoria.index',
        'uses' => 'SubsubcategoriaController@index',
        'middleware' => 'can:categoria.subsubcategorias.index'
    ]);
    $router->get('subsubcategorias/create', [
        'as' => 'admin.categoria.subsubcategoria.create',
        'uses' => 'SubsubcategoriaController@create',
        'middleware' => 'can:categoria.subsubcategorias.create'
    ]);
    $router->post('subsubcategorias', [
        'as' => 'admin.categoria.subsubcategoria.store',
        'uses' => 'SubsubcategoriaController@store',
        'middleware' => 'can:categoria.subsubcategorias.store'
    ]);
    $router->get('subsubcategorias/{subsubcategoria}/edit', [
        'as' => 'admin.categoria.subsubcategoria.edit',
        'uses' => 'SubsubcategoriaController@edit',
        'middleware' => 'can:categoria.subsubcategorias.edit'
    ]);
    $router->put('subsubcategorias/{subsubcategoria}', [
        'as' => 'admin.categoria.subsubcategoria.update',
        'uses' => 'SubsubcategoriaController@update',
        'middleware' => 'can:categoria.subsubcategorias.update'
    ]);
    $router->delete('subsubcategorias/{subsubcategoria}', [
        'as' => 'admin.categoria.subsubcategoria.destroy',
        'uses' => 'SubsubcategoriaController@destroy',
        'middleware' => 'can:categoria.subsubcategorias.destroy'
    ]);

});
