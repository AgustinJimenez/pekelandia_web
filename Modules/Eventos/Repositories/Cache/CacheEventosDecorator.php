<?php namespace Modules\Eventos\Repositories\Cache;

use Modules\Eventos\Repositories\EventosRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEventosDecorator extends BaseCacheDecorator implements EventosRepository
{
    public function __construct(EventosRepository $eventos)
    {
        parent::__construct();
        $this->entityName = 'eventos.eventos';
        $this->repository = $eventos;
    }
}
