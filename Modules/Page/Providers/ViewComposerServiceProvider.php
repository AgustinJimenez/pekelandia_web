<?php namespace Modules\Page\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	
	public function boot()
    {
        view()->composer('partials.navigation', function($view) 
        {
        	$view->with('categorias', Categoria::where('menu',1)->orderBy('orden','ASC')->get());
        	$view->with('subcategorias', Subcategoria::orderBy('nombre','ASC')->get());
        	$view->with('subsubcategorias', Subsubcategoria::orderBy('nombre','ASC')->get());
        });
    }

	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
