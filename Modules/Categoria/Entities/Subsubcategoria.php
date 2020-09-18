<?php namespace Modules\Categoria\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Subsubcategoria extends Model
{
    //use Translatable;

    protected $table = 'categoria__subsubcategorias';
    //public $translatedAttributes = [];
    protected $fillable = ['nombre', 'subcategoria_id'];

    public function subcategoria()
    {
        return $this->belongsTo('Modules\Categoria\Entities\Subcategoria','subcategoria_id');
    }

    public function empresa()
    {
    	return $this->hasMany('Modules\Empresa\Entities\Empresa','id');
    }
}
