<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $fillable = ['name','email','street','number','floor','aparment','zip_code','localidad_id','provincia_id'];

  public function purchase()
  {
    return $this->hasMany('App\Purchase');
  }


}
