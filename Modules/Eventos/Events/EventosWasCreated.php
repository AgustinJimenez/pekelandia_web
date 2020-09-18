<?php

namespace Modules\Eventos\Events;

use Modules\Eventos\Entities\Eventos;
use Modules\Media\Contracts\StoringMedia;

class EventosWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Eventos
     */
    public $eventos;

    public function __construct($eventos, array $data)
    {
        $this->data = $data;

        $this->eventos = $eventos;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->eventos;
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
