<?php namespace Modules\Anuncios\Repositories\Cache;

use Modules\Anuncios\Repositories\SuscriptoresRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSuscriptoresDecorator extends BaseCacheDecorator implements SuscriptoresRepository
{
    public function __construct(SuscriptoresRepository $suscriptores)
    {
        parent::__construct();
        $this->entityName = 'anuncios.suscriptores';
        $this->repository = $suscriptores;
    }
}
