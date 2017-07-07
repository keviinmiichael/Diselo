<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Purchase;

class Purchases_state extends Model
{
    protected $fillable = ['value'];

    public function purchase()
    {
      return $this->hasMany('App\Purchase');
    }
}
