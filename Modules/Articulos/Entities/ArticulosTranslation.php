<?php namespace Modules\Articulos\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticulosTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'articulos__articulos_translations';
}
