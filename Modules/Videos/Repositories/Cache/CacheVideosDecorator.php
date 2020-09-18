<?php namespace Modules\Videos\Repositories\Cache;

use Modules\Videos\Repositories\VideosRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheVideosDecorator extends BaseCacheDecorator implements VideosRepository
{
    public function __construct(VideosRepository $videos)
    {
        parent::__construct();
        $this->entityName = 'videos.videos';
        $this->repository = $videos;
    }
}
