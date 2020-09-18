<?php namespace Modules\Newsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class GruposTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'newsletter__grupos_translations';
}
