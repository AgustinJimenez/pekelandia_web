<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/videos'], function (Router $router) {
    $router->bind('videos', function ($id) {
        return app('Modules\Videos\Repositories\VideosRepository')->find($id);
    });
    $router->get('videos', [
        'as' => 'admin.videos.videos.index',
        'uses' => 'VideosController@index',
        'middleware' => 'can:videos.videos.index'
    ]);
    $router->get('videos/create', [
        'as' => 'admin.videos.videos.create',
        'uses' => 'VideosController@create',
        'middleware' => 'can:videos.videos.create'
    ]);
    $router->post('videos', [
        'as' => 'admin.videos.videos.store',
        'uses' => 'VideosController@store',
        'middleware' => 'can:videos.videos.store'
    ]);
    $router->get('videos/{videos}/edit', [
        'as' => 'admin.videos.videos.edit',
        'uses' => 'VideosController@edit',
        'middleware' => 'can:videos.videos.edit'
    ]);
    $router->put('videos/{videos}', [
        'as' => 'admin.videos.videos.update',
        'uses' => 'VideosController@update',
        'middleware' => 'can:videos.videos.update'
    ]);
    $router->delete('videos/{videos}', [
        'as' => 'admin.videos.videos.destroy',
        'uses' => 'VideosController@destroy',
        'middleware' => 'can:videos.videos.destroy'
    ]);
// append

});
