<?php namespace Modules\Paises\Repositories\Cache;

use Modules\Paises\Repositories\CiudadRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCiudadDecorator extends BaseCacheDecorator implements CiudadRepository
{
    public function __construct(CiudadRepository $ciudad)
    {
        parent::__construct();
        $this->entityName = 'paises.ciudads';
        $this->repository = $ciudad;
    }
}
