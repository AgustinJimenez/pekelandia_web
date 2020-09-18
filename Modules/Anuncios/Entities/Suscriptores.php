<?php namespace Modules\Anuncios\Entities;

//use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Suscriptores extends Model
{
    //use Translatable;

    protected $table = 'anuncios__suscriptores';
    public $translatedAttributes = [];
    protected $fillable = ['nombre','telefono','email'];
}
