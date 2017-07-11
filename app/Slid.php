<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slid extends Model
{
    protected $fillable = ['name'];

    public function image()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
