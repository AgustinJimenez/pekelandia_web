<?php namespace Modules\Anuncios\Repositories\Cache;

use Modules\Anuncios\Repositories\PublicidadRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePublicidadDecorator extends BaseCacheDecorator implements PublicidadRepository
{
    public function __construct(PublicidadRepository $publicidad)
    {
        parent::__construct();
        $this->entityName = 'anuncios.publicidads';
        $this->repository = $publicidad;
    }
}
