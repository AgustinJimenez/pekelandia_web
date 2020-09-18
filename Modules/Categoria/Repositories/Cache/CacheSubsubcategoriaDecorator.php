<?php namespace Modules\Categoria\Repositories\Cache;

use Modules\Categoria\Repositories\SubsubcategoriaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSubsubcategoriaDecorator extends BaseCacheDecorator implements SubsubcategoriaRepository
{
    public function __construct(SubsubcategoriaRepository $subsubcategoria)
    {
        parent::__construct();
        $this->entityName = 'categoria.subsubcategorias';
        $this->repository = $subsubcategoria;
    }
}
