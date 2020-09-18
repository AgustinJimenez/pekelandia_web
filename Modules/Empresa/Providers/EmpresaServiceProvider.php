<?php namespace Modules\Empresa\Providers;

use Illuminate\Support\ServiceProvider;

class EmpresaServiceProvider extends ServiceProvider
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
            'Modules\Empresa\Repositories\EmpresaRepository',
            function () {
                $repository = new \Modules\Empresa\Repositories\Eloquent\EloquentEmpresaRepository(new \Modules\Empresa\Entities\Empresa());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Empresa\Repositories\Cache\CacheEmpresaDecorator($repository);
            }
        );
// add bindings

    }
}
