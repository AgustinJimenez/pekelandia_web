<?php namespace Modules\Eventos\Providers;

use Illuminate\Support\ServiceProvider;

class EventosServiceProvider extends ServiceProvider
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
            'Modules\Eventos\Repositories\EventosRepository',
            function () {
                $repository = new \Modules\Eventos\Repositories\Eloquent\EloquentEventosRepository(new \Modules\Eventos\Entities\Eventos());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Eventos\Repositories\Cache\CacheEventosDecorator($repository);
            }
        );
// add bindings

    }
}
