<?php namespace Modules\Articulos\Providers;

use Illuminate\Support\ServiceProvider;

class ArticulosServiceProvider extends ServiceProvider
{
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
    public function register()
    {
        $this->registerBindings();
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

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Articulos\Repositories\ArticulosRepository',
            function () {
                $repository = new \Modules\Articulos\Repositories\Eloquent\EloquentArticulosRepository(new \Modules\Articulos\Entities\Articulos());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Articulos\Repositories\Cache\CacheArticulosDecorator($repository);
            }
        );
// add bindings

    }
}
