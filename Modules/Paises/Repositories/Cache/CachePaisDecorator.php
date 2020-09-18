<?php namespace Modules\Paises\Repositories\Cache;

use Modules\Paises\Repositories\PaisRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePaisDecorator extends BaseCacheDecorator implements PaisRepository
{
    public function __construct(PaisRepository $pais)
    {
        parent::__construct();
        $this->entityName = 'paises.pais';
        $this->repository = $pais;
    }
}
