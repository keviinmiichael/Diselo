<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use SoftDeletes;

  protected $fillable = ['name','email','street','number','floor','aparment','zip_code','localidad_id','provincia_id'];

  public function purchases()
  {
    return $this->hasMany('App\Purchase');
  }


}
