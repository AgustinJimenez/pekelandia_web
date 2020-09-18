<?php namespace Modules\Empresa\Repositories\Cache;

use Modules\Empresa\Repositories\EmpresaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEmpresaDecorator extends BaseCacheDecorator implements EmpresaRepository
{
    public function __construct(EmpresaRepository $empresa)
    {
        parent::__construct();
        $this->entityName = 'empresa.empresas';
        $this->repository = $empresa;
    }
}
