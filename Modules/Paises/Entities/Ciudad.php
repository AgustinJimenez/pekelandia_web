<?php namespace Modules\Paises\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use Translatable;

    protected $table = 'paises__ciudads';
    public $translatedAttributes = [];
    protected $fillable = ['nombre','pais_id'];

    public function pais()
    {
        return $this->belongsTo('Modules\Paises\Entities\Pais','pais_id');
    }

    public function empresa()
    {
    	return $this->hasOne('Modules\Empresa\Entities\Empresa');
    }
}
