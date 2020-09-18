<?php namespace Modules\Newsletter\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    use Translatable;

    protected $table = 'newsletter__emails';
    public $translatedAttributes = [];
    protected $fillable = ['nombre','email','grupo_id'];

    public function grupo()
    {
        return $this->belongsTo('Modules\Newsletter\Entities\Grupos','grupo_id');
    }

}
