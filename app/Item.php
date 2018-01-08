<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Unite;
    
    public $timestamps = false;
    protected $fillable = ['name','price','cost','amount','product_id','purchase_id', 'color', 'size'];

    public function color()
    {
        return $this->belongsTo('App\Color');
    }

    public function size()
    {
        return $this->belongsTo('App\Size');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

    //scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('product.name', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('items.*, colors.value as color, products.name as product, "images.src" as thumb'))
            ->unite('product')
            ->unite('color')
            /*->leftJoin('images', function ($join) {
                $join->on('products.id', '=', 'images.imageable_id')
                    ->where('images.imageable_type', '=', 'App\Product');
            })*/
            ->groupBy('product.id', 'item.id', 'color.id')
            ->orderBy(request('order.0.column'), request('order.0.dir'))
            //->orderBy('images.order')
            ->take(request('length'))
            ->skip(request('start'))
        ;
    }


}
