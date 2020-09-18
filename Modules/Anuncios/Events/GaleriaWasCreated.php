<?php

namespace Modules\Anuncios\Events;

use Modules\Anuncios\Entities\Galeria;
use Modules\Media\Contracts\StoringMedia;

class GaleriaWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Anuncios
     */
    public $galeria;

    public function __construct($galeria, array $data)
    {
        $this->data = $data;

        $this->galeria = $galeria;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->galeria;
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
