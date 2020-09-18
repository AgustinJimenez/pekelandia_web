<?php namespace Modules\Anuncios\Entities;

use Illuminate\Database\Eloquent\Model;

class SuscriptoresTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'anuncios__suscriptores_translations';
}
