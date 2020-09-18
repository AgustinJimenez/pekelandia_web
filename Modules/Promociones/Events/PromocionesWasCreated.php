<?php

namespace Modules\Promociones\Events;

use Modules\Promociones\Entities\Promociones;
use Modules\Media\Contracts\StoringMedia;

class PromocionesWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Promociones
     */
    public $promociones;

    public function __construct($promociones, array $data)
    {
        $this->data = $data;

        $this->promociones = $promociones;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->promociones;
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
