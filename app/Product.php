<?php

namespace App;

use App\CustomClasses\Unite;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Sluggable, Unite;

    protected $fillable = ['name', 'description','slug','code','price','cost','profit_margin','stock','category_id','subcategory_id','is_visible'];

    public function item()
    {
        return $this->hasOne('App\Item');
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
        return $this->morphMany('App\Image', 'imageable')->orderBy('order');
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    //getters y setters
    public function getPriceAttribute($price)
    {
        if (!$price) $price = ceil($this->cost * $this->profit_margin / 100 + $this->cost);
        return $price;
    }

    public function getThumbAttribute()
    {
        if (!$image = $this->images()->first()) {
            $src = 'imagen-no-disponible.jpg';
        } else {
             $src = $image->src;
        }
        return $src;
    }

    public function getStockAttribute()
    {
        return (int)Stock::select(\DB::raw('sum(amount) as total'))
            ->where('product_id', $this->id)
            ->first()
            ->total
        ;
    }
    //-----------------

    public static function bestsellers($take=3)
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();
        $query = Item::select(\DB::raw('count(product_id) as total, product_id'))
            ->unite('purchase')
            ->unite('product')
            ->where('products.is_visible', 1)
            ->groupBy('product_id')
            ->orderBy('total', 'desc')
            ->take($take)
        ;
        $products = $query->whereBetween('purchases.created_at', [$start, $end])->get();
        if (!$products->count()) $products = $query->get();
        $ids = $products->map(function ($item, $key) {return $item->product_id;});
        return Product::whereIn('id', $ids->toArray())->get();
    }

    //scopes
    public function scopeVisible($query)
    {
        $query->where('is_visible', 1);
    }
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
            ->unite('subcategory', true)
            ->unite('images', true)
            ->take(request('length'))
            ->skip(request('start'))
            ->orderBy(request('order.0.column'), request('order.0.dir'))
            ->orderBy('images.order')
            ->groupBy('products.id')
        ;
    }

}
