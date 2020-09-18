<?php

namespace Modules\Anuncios\Events;

use Modules\Anuncios\Entities\Anuncios;
use Modules\Media\Contracts\StoringMedia;

class AnunciosWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Anuncios
     */
    public $anuncios;

    public function __construct($anuncios, array $data)
    {
        $this->data = $data;

        $this->anuncios = $anuncios;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->anuncios;
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
