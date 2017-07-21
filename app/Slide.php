<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use Unite;

    protected $fillable = ['name'];

    public function images()
    {
        return $this->morphMany('App\Image');
    }
}
