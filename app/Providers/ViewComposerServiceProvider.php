<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Categoria\Entities\Categoria;
use Modules\Categoria\Entities\Subcategoria;
use Modules\Categoria\Entities\Subsubcategoria;
use Modules\Empresa\Entities\Empresa;
use Modules\Anuncios\Entities\Anuncios;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('partials.navigation', function($view) 
        {
            $view->with('anuncios', Anuncios::where('vista','Banner')->where('mostrar',1)->limit(3)->get());
            $view->with('categorias', Categoria::where('menu',1)->orderBy('orden','ASC')->get());
            $view->with('subcategorias', Subcategoria::orderBy('nombre','ASC')->get());
            $view->with('subsubcategorias', Subsubcategoria::orderBy('nombre','ASC')->get());
        });
        
        view()->composer('partials.sidebar', function($view) 
        {
            $view->with('categorias', Categoria::where('menu',1)->orderBy('orden','ASC')->get());
            $view->with('subcategorias', Subcategoria::orderBy('nombre','ASC')->get());
            $view->with('subsubcategorias', Subsubcategoria::orderBy('nombre','ASC')->get());
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
