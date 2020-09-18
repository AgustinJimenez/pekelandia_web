<?php namespace Modules\Categoria\Providers;

use Illuminate\Support\ServiceProvider;

class CategoriaServiceProvider extends ServiceProvider
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
            'Modules\Categoria\Repositories\CategoriaRepository',
            function () {
                $repository = new \Modules\Categoria\Repositories\Eloquent\EloquentCategoriaRepository(new \Modules\Categoria\Entities\Categoria());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Categoria\Repositories\Cache\CacheCategoriaDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Categoria\Repositories\SubcategoriaRepository',
            function () {
                $repository = new \Modules\Categoria\Repositories\Eloquent\EloquentSubcategoriaRepository(new \Modules\Categoria\Entities\Subcategoria());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Categoria\Repositories\Cache\CacheSubcategoriaDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Categoria\Repositories\SubsubcategoriaRepository',
            function () {
                $repository = new \Modules\Categoria\Repositories\Eloquent\EloquentSubsubcategoriaRepository(new \Modules\Categoria\Entities\Subsubcategoria());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Categoria\Repositories\Cache\CacheSubsubcategoriaDecorator($repository);
            }
        );
// add bindings



    }
}
