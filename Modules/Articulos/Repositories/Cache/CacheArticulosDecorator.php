<?php namespace Modules\Articulos\Repositories\Cache;

use Modules\Articulos\Repositories\ArticulosRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheArticulosDecorator extends BaseCacheDecorator implements ArticulosRepository
{
    public function __construct(ArticulosRepository $articulos)
    {
        parent::__construct();
        $this->entityName = 'articulos.articulos';
        $this->repository = $articulos;
    }
}
