<?php namespace Modules\Newsletter\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Enviados extends Model {

	protected $table = 'newsletter__enviados';
    protected $fillable = ['asunto','mensaje','grupo_id','email'];

    public function grupo()
    {
        return $this->belongsTo('Modules\Newsletter\Entities\Grupos','grupo_id');
    }

}