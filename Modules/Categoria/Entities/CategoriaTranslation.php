<?php namespace Modules\Categoria\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoriaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'categoria__categoria_translations';
}
