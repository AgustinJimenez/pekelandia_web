<?php namespace Modules\Anuncios\Providers;

use Illuminate\Support\ServiceProvider;

class AnunciosServiceProvider extends ServiceProvider
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
            'Modules\Anuncios\Repositories\AnunciosRepository',
            function () {
                $repository = new \Modules\Anuncios\Repositories\Eloquent\EloquentAnunciosRepository(new \Modules\Anuncios\Entities\Anuncios());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Anuncios\Repositories\Cache\CacheAnunciosDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Anuncios\Repositories\GaleriaRepository',
            function () {
                $repository = new \Modules\Anuncios\Repositories\Eloquent\EloquentGaleriaRepository(new \Modules\Anuncios\Entities\Galeria());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Anuncios\Repositories\Cache\CacheGaleriaDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Anuncios\Repositories\PublicidadRepository',
            function () {
                $repository = new \Modules\Anuncios\Repositories\Eloquent\EloquentPublicidadRepository(new \Modules\Anuncios\Entities\Publicidad());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Anuncios\Repositories\Cache\CachePublicidadDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Anuncios\Repositories\SuscriptoresRepository',
            function () {
                $repository = new \Modules\Anuncios\Repositories\Eloquent\EloquentSuscriptoresRepository(new \Modules\Anuncios\Entities\Suscriptores());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Anuncios\Repositories\Cache\CacheSuscriptoresDecorator($repository);
            }
        );
// add bindings




    }
}
