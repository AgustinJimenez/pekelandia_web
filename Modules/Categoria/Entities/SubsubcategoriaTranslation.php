<?php namespace Modules\Categoria\Entities;

use Illuminate\Database\Eloquent\Model;

class SubsubcategoriaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'categoria__subsubcategoria_translations';
}
