<?php namespace Modules\Categoria\Repositories\Cache;

use Modules\Categoria\Repositories\CategoriaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoriaDecorator extends BaseCacheDecorator implements CategoriaRepository
{
    public function __construct(CategoriaRepository $categoria)
    {
        parent::__construct();
        $this->entityName = 'categoria.categorias';
        $this->repository = $categoria;
    }
}
