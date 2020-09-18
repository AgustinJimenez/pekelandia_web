<?php

namespace Modules\Articulos\Events;

use Modules\Articulos\Entities\Articulos;
use Modules\Media\Contracts\StoringMedia;

class ArticulosWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Articulos
     */
    public $articulos;

    public function __construct($articulos, array $data)
    {
        $this->data = $data;

        $this->articulos = $articulos;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->articulos;
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
