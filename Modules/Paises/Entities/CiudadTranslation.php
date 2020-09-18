<?php namespace Modules\Paises\Entities;

use Illuminate\Database\Eloquent\Model;

class CiudadTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'paises__ciudad_translations';
}
