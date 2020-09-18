<?php

namespace Modules\Revistas\Events;

use Modules\Revistas\Entities\Revistas;
use Modules\Media\Contracts\StoringMedia;

class RevistasWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Revistas
     */
    public $revistas;

    public function __construct($revistas, array $data)
    {
        $this->data = $data;

        $this->revistas = $revistas;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->revistas;
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