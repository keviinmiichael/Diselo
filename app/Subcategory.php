<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Subcategory extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = ['name', 'slug'];

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function products()
    {
      return $this->hasMany('App\Product');
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }
}
