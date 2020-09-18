<?php namespace Modules\Newsletter\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use Translatable;

    protected $table = 'newsletter__grupos';
    public $translatedAttributes = [];
    protected $fillable = ['nombre'];

    public function email()
    {
    	return $this->hasOne('Modules\Newsletter\Entities\Emails');
    }

    public function enviados()
    {
    	return $this->hasOne('Modules\Newsletter\Entities\Enviados');
    }

}
