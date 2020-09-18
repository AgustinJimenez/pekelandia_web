<?php namespace Modules\Empresa\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Empresa extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'empresa__empresas';
    public $translatedAttributes = [];
    protected $fillable = ['nombre', 'rubro', 'direccion', 'telefono', 'web', 'subcategoria_id', 'subsubcategoria_id','email','ciudad_id','mapa','pais_id'];

    public function subcategoria()
    {
        return $this->belongsTo('Modules\Categoria\Entities\Subcategoria','subcategoria_id');
    }

    public function subsubcategoria()
    {
        return $this->belongsTo('Modules\Categoria\Entities\Subsubcategoria','subsubcategoria_id');
    }

    public function pais()
    {
        return $this->belongsTo('Modules\Paises\Entities\Pais','pais_id');
    }

    public function ciudad()
    {
        return $this->belongsTo('Modules\Paises\Entities\Ciudad','ciudad_id');
    }

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
          return $this->files()->first()->path->getUrl();
        }else{
          return "";
        }
    }
}
