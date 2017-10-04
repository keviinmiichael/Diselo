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

    public function stocks()
    {
        return $this->hasMany('App\Stock');
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

    public function getPriceFormatAttribute($price)
    {
        return (!$this->profit_margin && $this->id)?2:1;
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
        return Product::whereIn('id', $ids->toArray())->visible()->get();
    }

    //scopes
    public function scopeVisible($query)
    {
        $query->where('is_visible', 1)
            ->unite('stocks')
            //->where('products.id', $this->id)
            ->where('amount', '>' , '0')
            ->groupBy('products.id')
        ;
    }
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('products.name', 'like', request('search.value').'%')
                ->orWhere('products.code', 'like', request('search.value').'%');
        }
    }
    public function scopeFilter($query)
    {
        if (request()->has('sizes')) {
            $query->whereIn('size_id', request('sizes'))->groupBy('size_id');
        }
        if (request()->has('subcategories')) {
            //dd(request('subcategories'));
            $query->whereIn('subcategory_id', request('subcategories'))->groupBy('subcategory_id');
        }
		if (request()->has('sort')) {
            list($column, $direction) = explode('-', request('sort'));
            if (in_array($column, ['name', 'price'])) $query->orderBy($column, $direction);
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

    public function availableColors($size_id=false)
    {
        $query = Stock::select('colors.id', 'colors.value as value')
            ->unite('color')
            ->where('product_id', $this->id)
            ->where('amount', '>', 0)
            ->groupBy('colors.id')
        ;
        if ($size_id) $query->where('stock.size_id', $size_id);
        return $query->get();
    }

    public function availableSizes($color_id=false)
    {
        $query = Stock::select('sizes.id', 'sizes.value as value')
            ->unite('size')
            ->where('product_id', $this->id)
            ->where('amount', '>', 0)
            ->groupBy('sizes.id')
        ;
        if ($color_id) $query->where('stock.color_id', $color_id);
        return $query->get();
    }

    public function availableStock($size_id, $color_id)
    {
        return Stock::select('stock.amount')
            ->where('product_id', $this->id)
            ->where('stock.size_id', $size_id)
            ->where('stock.color_id', $color_id)
            ->first()
        ;
    }

    //productos relacionados
    public function addRelated($product_id)
    {
        RelatedProducts::addRalation($this->id, $product_id);
    }

    public function getRelateds($limit=8)
    {
        return self::whereRaw('id in (select CASE WHEN product1 = '.$this->id.' THEN product2 ELSE product1 END from related_products where (product1 = '.$this->id.' or product2 = '.$this->id.') order by times desc )')
            ->where('id', '<>', $this->id)
            ->visible()
            ->limit($limit)
            ->get()
        ;
    }

}
