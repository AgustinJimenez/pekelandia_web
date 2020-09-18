<?php namespace Modules\Revistas\Providers;

use Illuminate\Support\ServiceProvider;

class RevistasServiceProvider extends ServiceProvider
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
            'Modules\Revistas\Repositories\RevistasRepository',
            function () {
                $repository = new \Modules\Revistas\Repositories\Eloquent\EloquentRevistasRepository(new \Modules\Revistas\Entities\Revistas());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Revistas\Repositories\Cache\CacheRevistasDecorator($repository);
            }
        );
// add bindings

    }
}
