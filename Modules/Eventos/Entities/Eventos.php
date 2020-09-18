<?php namespace Modules\Eventos\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
use DateTime;

class Eventos extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'eventos__eventos';
    public $translatedAttributes = [];
    protected $fillable = ['titulo','fecha','destacado','mostrar','contenido','tags'];

    public function getImagenAttribute()
    {
        if ($this->files()->first()){
          return $this->files()->first()->path->getUrl();
        }else{
          return "";
        }
    }

    public function getFechaAttribute()
    {
        $date = $this->attributes['fecha'];
        $dateObject = DateTime::createFromFormat('Y-m-d', $date);
        //dd($dateObject);
        //return $dateObject->format('d-m-Y');
        return $dateObject;
    }

}
