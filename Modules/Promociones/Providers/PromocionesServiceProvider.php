<?php namespace Modules\Promociones\Providers;

use Illuminate\Support\ServiceProvider;

class PromocionesServiceProvider extends ServiceProvider
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
            'Modules\Promociones\Repositories\PromocionesRepository',
            function () {
                $repository = new \Modules\Promociones\Repositories\Eloquent\EloquentPromocionesRepository(new \Modules\Promociones\Entities\Promociones());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Promociones\Repositories\Cache\CachePromocionesDecorator($repository);
            }
        );
// add bindings

    }
}
