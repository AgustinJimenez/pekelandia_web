<?php namespace Modules\Anuncios\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Galeria extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'anuncios__galerias';
    public $translatedAttributes = [];
    protected $fillable = ['titulo','descripcion','vinculo','orden','mostrar'];

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
          return $this->files()->first()->path->getUrl();
        }else{
          return "";
        }
    }
}
