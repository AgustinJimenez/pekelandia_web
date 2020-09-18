<?php namespace Modules\Categoria\Entities;

use Illuminate\Database\Eloquent\Model;

class SubcategoriaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'categoria__subcategoria_translations';
}
