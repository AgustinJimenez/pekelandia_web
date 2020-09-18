<?php namespace Modules\Articulos\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Articulos extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'articulos__articulos';
    public $translatedAttributes = [];
    protected $fillable = ['titulo','mostrar','contenido','codigoembed','tags'];

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
          return $this->files()->first()->path->getUrl();
        }else{
          return "";
        }
    }

}
