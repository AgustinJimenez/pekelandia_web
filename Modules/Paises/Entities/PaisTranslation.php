<?php namespace Modules\Paises\Entities;

use Illuminate\Database\Eloquent\Model;

class PaisTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'paises__pais_translations';
}
