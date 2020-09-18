<?php namespace Modules\Anuncios\Entities;

use Illuminate\Database\Eloquent\Model;

class AnunciosTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'anuncios__anuncios_translations';
}
