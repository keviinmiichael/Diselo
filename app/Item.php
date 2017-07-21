<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Unite;
    
    protected $fillable = ['name','price','cost','amount','product_id','purchase_id'];

    public function product()
    {
        return $this->hasOne('App\product');
    }

    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }


}
