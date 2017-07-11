<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['src','imageable_id','imageable_type','is_video','pending','order','title','caption','url'];

    public function products()
    {
        return $this->morphedByMany('App\Product', 'taggable');
    }

    public function slides()
    {
        return $this->morphedTo('App\Slid', 'taggable');
    }
}
