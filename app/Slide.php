<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['name'];

    public function images()
    {
        return $this->morphMany('App\Image');
    }
}
