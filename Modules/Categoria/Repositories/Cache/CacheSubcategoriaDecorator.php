<?php namespace Modules\Categoria\Repositories\Cache;

use Modules\Categoria\Repositories\SubcategoriaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSubcategoriaDecorator extends BaseCacheDecorator implements SubcategoriaRepository
{
    public function __construct(SubcategoriaRepository $subcategoria)
    {
        parent::__construct();
        $this->entityName = 'categoria.subcategorias';
        $this->repository = $subcategoria;
    }
}
