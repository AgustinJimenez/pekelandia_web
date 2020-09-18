<?php namespace Modules\Promociones\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Promociones extends Model
{
    use MediaRelation;

    protected $table = 'promociones__promociones';
    public $translatedAttributes = [];
    protected $fillable = ['titulo','mostrar','contenido','tipo','tags'];

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
          return $this->files()->first()->path->getUrl();
        }else{
          return "";
        }
    }
}
