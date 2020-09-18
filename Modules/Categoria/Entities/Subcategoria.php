<?php namespace Modules\Categoria\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use Translatable;

    protected $table = 'categoria__subcategorias';
    public $translatedAttributes = [];
    protected $fillable = ['nombre', 'categoria_id', 'tiene_hijos'];

    public function categoria()
    {
        return $this->belongsTo('Modules\Categoria\Entities\Categoria','categoria_id');
    }

    public function subsubcategoria()
    {
    	return $this->hasOne('Modules\Categoria\Entities\Subsubcategoria');
    }

    public function empresa()
    {
        return $this->hasMany('Modules\Empresa\Entities\Empresa','id');
    }
}
