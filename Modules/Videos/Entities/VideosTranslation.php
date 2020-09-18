<?php namespace Modules\Videos\Entities;

use Illuminate\Database\Eloquent\Model;

class VideosTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'videos__videos_translations';
}
