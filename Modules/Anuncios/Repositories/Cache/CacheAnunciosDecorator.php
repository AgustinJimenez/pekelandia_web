<?php namespace Modules\Anuncios\Repositories\Cache;

use Modules\Anuncios\Repositories\AnunciosRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAnunciosDecorator extends BaseCacheDecorator implements AnunciosRepository
{
    public function __construct(AnunciosRepository $anuncios)
    {
        parent::__construct();
        $this->entityName = 'anuncios.anuncios';
        $this->repository = $anuncios;
    }
}
