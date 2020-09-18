<?php namespace Modules\Videos\Providers;

use Illuminate\Support\ServiceProvider;

class VideosServiceProvider extends ServiceProvider
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
            'Modules\Videos\Repositories\VideosRepository',
            function () {
                $repository = new \Modules\Videos\Repositories\Eloquent\EloquentVideosRepository(new \Modules\Videos\Entities\Videos());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Videos\Repositories\Cache\CacheVideosDecorator($repository);
            }
        );
// add bindings

    }
}
