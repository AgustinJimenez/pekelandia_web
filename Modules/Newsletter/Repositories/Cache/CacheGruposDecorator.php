<?php namespace Modules\Newsletter\Repositories\Cache;

use Modules\Newsletter\Repositories\GruposRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGruposDecorator extends BaseCacheDecorator implements GruposRepository
{
    public function __construct(GruposRepository $grupos)
    {
        parent::__construct();
        $this->entityName = 'newsletter.grupos';
        $this->repository = $grupos;
    }
}
