<?php namespace Modules\Anuncios\Entities;

use Illuminate\Database\Eloquent\Model;

class GaleriaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'anuncios__galeria_translations';
}
