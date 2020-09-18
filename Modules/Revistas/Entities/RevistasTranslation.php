<?php namespace Modules\Revistas\Entities;

use Illuminate\Database\Eloquent\Model;

class RevistasTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'revistas__revistas_translations';
}
