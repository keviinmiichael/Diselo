<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug'];


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

    //scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('name', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->take(request('length'))->skip(request('start'));
    }
    //------

    
}
