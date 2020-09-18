<?php namespace Modules\Revistas\Repositories\Cache;

use Modules\Revistas\Repositories\RevistasRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheRevistasDecorator extends BaseCacheDecorator implements RevistasRepository
{
    public function __construct(RevistasRepository $revistas)
    {
        parent::__construct();
        $this->entityName = 'revistas.revistas';
        $this->repository = $revistas;
    }
}
