<?php

namespace App;

use App\CustomClasses\ToForm;
use App\CustomClasses\Unite;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes, Sluggable, Unite, ToForm;

    protected $fillable = ['name', 'slug', 'category_id'];

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
}
