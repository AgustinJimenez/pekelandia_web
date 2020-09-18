<?php namespace Modules\Paises\Providers;

use Illuminate\Support\ServiceProvider;

class PaisesServiceProvider extends ServiceProvider
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
            'Modules\Paises\Repositories\PaisRepository',
            function () {
                $repository = new \Modules\Paises\Repositories\Eloquent\EloquentPaisRepository(new \Modules\Paises\Entities\Pais());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Paises\Repositories\Cache\CachePaisDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Paises\Repositories\CiudadRepository',
            function () {
                $repository = new \Modules\Paises\Repositories\Eloquent\EloquentCiudadRepository(new \Modules\Paises\Entities\Ciudad());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Paises\Repositories\Cache\CacheCiudadDecorator($repository);
            }
        );
// add bindings


    }
}
