<?php namespace Modules\Videos\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use Translatable;

    protected $table = 'videos__videos';
    public $translatedAttributes = [];
    protected $fillable = ['titulo','mostrar','codigoembed'];
}
