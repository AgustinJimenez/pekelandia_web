<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/newsletter'], function (Router $router) {
    $router->bind('emails', function ($id) {
        return app('Modules\Newsletter\Repositories\EmailsRepository')->find($id);
    });
    $router->get('emails', [
        'as' => 'admin.newsletter.emails.index',
        'uses' => 'EmailsController@index',
        'middleware' => 'can:newsletter.emails.index'
    ]);
    $router->get('emails/create', [
        'as' => 'admin.newsletter.emails.create',
        'uses' => 'EmailsController@create',
        'middleware' => 'can:newsletter.emails.create'
    ]);
    $router->post('emails', [
        'as' => 'admin.newsletter.emails.store',
        'uses' => 'EmailsController@store',
        'middleware' => 'can:newsletter.emails.store'
    ]);
    $router->get('emails/{emails}/edit', [
        'as' => 'admin.newsletter.emails.edit',
        'uses' => 'EmailsController@edit',
        'middleware' => 'can:newsletter.emails.edit'
    ]);
    $router->put('emails/{emails}', [
        'as' => 'admin.newsletter.emails.update',
        'uses' => 'EmailsController@update',
        'middleware' => 'can:newsletter.emails.update'
    ]);
    $router->delete('emails/{emails}', [
        'as' => 'admin.newsletter.emails.destroy',
        'uses' => 'EmailsController@destroy',
        'middleware' => 'can:newsletter.emails.destroy'
    ]);
    $router->bind('grupos', function ($id) {
        return app('Modules\Newsletter\Repositories\GruposRepository')->find($id);
    });
    $router->get('grupos', [
        'as' => 'admin.newsletter.grupos.index',
        'uses' => 'GruposController@index',
        'middleware' => 'can:newsletter.grupos.index'
    ]);
    $router->get('grupos/create', [
        'as' => 'admin.newsletter.grupos.create',
        'uses' => 'GruposController@create',
        'middleware' => 'can:newsletter.grupos.create'
    ]);
    $router->post('grupos', [
        'as' => 'admin.newsletter.grupos.store',
        'uses' => 'GruposController@store',
        'middleware' => 'can:newsletter.grupos.store'
    ]);
    $router->get('grupos/{grupos}/edit', [
        'as' => 'admin.newsletter.grupos.edit',
        'uses' => 'GruposController@edit',
        'middleware' => 'can:newsletter.grupos.edit'
    ]);
    $router->put('grupos/{grupos}', [
        'as' => 'admin.newsletter.grupos.update',
        'uses' => 'GruposController@update',
        'middleware' => 'can:newsletter.grupos.update'
    ]);
    $router->delete('grupos/{grupos}', [
        'as' => 'admin.newsletter.grupos.destroy',
        'uses' => 'GruposController@destroy',
        'middleware' => 'can:newsletter.grupos.destroy'
    ]);
// append

    $router->get('emails/createEmail', [
        'as' => 'admin.newsletter.emails.createEmail',
        'uses' => 'EmailsController@createEmail'
    ]);

    $router->get('emails/createEmailGrupo', [
        'as' => 'admin.newsletter.emails.createEmailGrupo',
        'uses' => 'EmailsController@createEmailGrupo'
    ]);

    $router->post('emails/sendEmail', [
        'as' => 'admin.newsletter.emails.sendEmail',
        'uses' => 'EmailsController@sendEmail'
    ]);

    $router->get('emails/emailsEnviados', [
        'as' => 'admin.newsletter.emails.emailsEnviados',
        'uses' => 'EmailsController@emailsEnviados'
    ]);

    $router->get('emails/detalleEmail/{enviado}', [
        'as' => 'admin.newsletter.emails.detalleEmail',
        'uses' => 'EmailsController@detalleEmail'
    ]);

    $router->delete('emails/emailsEnviados/{enviado}', [
        'as' => 'admin.newsletter.emails.emailsEnviados.destroy',
        'uses' => 'EmailsController@eliminarEmail'
    ]);


});
