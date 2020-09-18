<?php namespace Modules\Empresa\Entities;

use Illuminate\Database\Eloquent\Model;

class EmpresaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'empresa__empresa_translations';
}
