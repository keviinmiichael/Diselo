<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name','slug','code','price','cost','profit_margin','stock','category_id','visible'];

  public function item()
    {
      return $this->belongsTo('App\Item');
    }
  public function category()
    {
      return $this->belongsTo('App\Category');
    }
  public function image()
    {
      return $this->morphMany('App\Image');
    }

}
