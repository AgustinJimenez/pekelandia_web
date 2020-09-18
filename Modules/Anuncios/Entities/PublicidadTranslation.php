<?php namespace Modules\Anuncios\Entities;

use Illuminate\Database\Eloquent\Model;

class PublicidadTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'anuncios__publicidad_translations';
}
