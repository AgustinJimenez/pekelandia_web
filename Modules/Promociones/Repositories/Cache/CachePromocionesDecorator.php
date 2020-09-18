<?php namespace Modules\Promociones\Repositories\Cache;

use Modules\Promociones\Repositories\PromocionesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePromocionesDecorator extends BaseCacheDecorator implements PromocionesRepository
{
    public function __construct(PromocionesRepository $promociones)
    {
        parent::__construct();
        $this->entityName = 'promociones.promociones';
        $this->repository = $promociones;
    }
}
