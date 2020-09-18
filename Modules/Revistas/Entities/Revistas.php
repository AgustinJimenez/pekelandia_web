<?php namespace Modules\Revistas\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Revistas extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'revistas__revistas';
    public $translatedAttributes = [];
    protected $fillable = ['titulo','numero','year','mostrar','codigoembed'];

	public function getImagenAttribute()
    {
        if ($this->files()->first()){
          return $this->files()->first()->path->getUrl();
        }else{
          return "";
        }
    }

}
