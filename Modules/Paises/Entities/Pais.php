<?php namespace Modules\Paises\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use Translatable;

    protected $table = 'paises__pais';
    public $translatedAttributes = [];
    protected $fillable = ['nombre'];

    public function ciudad()
    {
    	return $this->hasOne('Modules\Paises\Entities\Ciudad');
    }

    public function empresa()
    {
    	return $this->hasOne('Modules\Empresa\Entities\Empresa');
    }

}
