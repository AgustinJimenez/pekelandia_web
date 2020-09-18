<?php namespace Modules\Categoria\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use Translatable;

    protected $table = 'categoria__categorias';
    public $translatedAttributes = [];
    protected $fillable = ['nombre','orden','menu'];

    public function subcategoria()
    {
    	return $this->hasOne('Modules\Categoria\Entities\Subcategoria');
    }
}
