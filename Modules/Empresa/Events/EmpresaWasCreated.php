<?php

namespace Modules\Empresa\Events;

use Modules\Empresa\Entities\Empresa;
use Modules\Media\Contracts\StoringMedia;

class EmpresaWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Empresa
     */
    public $empresa;

    public function __construct($empresa, array $data)
    {
        $this->data = $data;

        $this->empresa = $empresa;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->empresa;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}