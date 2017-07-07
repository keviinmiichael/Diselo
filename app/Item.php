<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable = ['name','price','cost','amount','product_id','purchase_id'];

  public function product()
    {
      return $this->hasMany('App\product');
    }

  public function purchase()
    {
      return $this->belongsTo('App\Purchase');
    }


}
