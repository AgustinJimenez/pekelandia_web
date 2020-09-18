<?php namespace Modules\Newsletter\Providers;

use Illuminate\Support\ServiceProvider;

class NewsletterServiceProvider extends ServiceProvider
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
            'Modules\Newsletter\Repositories\EmailsRepository',
            function () {
                $repository = new \Modules\Newsletter\Repositories\Eloquent\EloquentEmailsRepository(new \Modules\Newsletter\Entities\Emails());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Newsletter\Repositories\Cache\CacheEmailsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Newsletter\Repositories\GruposRepository',
            function () {
                $repository = new \Modules\Newsletter\Repositories\Eloquent\EloquentGruposRepository(new \Modules\Newsletter\Entities\Grupos());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Newsletter\Repositories\Cache\CacheGruposDecorator($repository);
            }
        );
// add bindings


    }
}
