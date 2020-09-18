<?php namespace Modules\Eventos\Entities;

use Illuminate\Database\Eloquent\Model;

class EventosTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'eventos__eventos_translations';
}
