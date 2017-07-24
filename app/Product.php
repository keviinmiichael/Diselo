<?php

namespace App;

use App\CustomClasses\Unite;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Sluggable, Unite;

    protected $fillable = ['name','slug','code','price','cost','profit_margin','stock','category_id','subcategory_id','visible'];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
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
            $query->where('products.name', 'like', request('search.value').'%')
                ->orWhere('products.code', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('products.*, images.src as thumb, categories.name as category, subcategories.name as subcategory'))
            ->unite('category')
            ->unite('subcategory')
            ->unite('images', true)
            ->take(request('length'))
            ->skip(request('start'));
    }

}
