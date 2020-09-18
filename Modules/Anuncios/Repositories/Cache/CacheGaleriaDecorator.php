<?php namespace Modules\Anuncios\Repositories\Cache;

use Modules\Anuncios\Repositories\GaleriaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGaleriaDecorator extends BaseCacheDecorator implements GaleriaRepository
{
    public function __construct(GaleriaRepository $galeria)
    {
        parent::__construct();
        $this->entityName = 'anuncios.galerias';
        $this->repository = $galeria;
    }
}
