<?php namespace Modules\Anuncios\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    use Translatable;

    protected $table = 'anuncios__publicidads';
    public $translatedAttributes = [];
    protected $fillable = ['titulo','descripcion','plan','orden'];
}
