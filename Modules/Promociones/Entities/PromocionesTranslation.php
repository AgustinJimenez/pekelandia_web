<?php namespace Modules\Promociones\Entities;

use Illuminate\Database\Eloquent\Model;

class PromocionesTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'promociones__promociones_translations';
}
