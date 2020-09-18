<?php namespace Modules\Newsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class EmailsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'newsletter__emails_translations';
}
