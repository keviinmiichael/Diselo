<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use SoftDeletes, Sluggable;
    
    protected $fillable = ['name','slug','code','price','cost','profit_margin','stock','category_id','visible'];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
  
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->morphMany('App\Image');
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

}
