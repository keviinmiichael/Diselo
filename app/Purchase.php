<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['total','cost','paid','client_id','state_id'];

    public function client()
    {
        return $this->belongsTo('App/Client');
    }

    public function state()
    {
        return $this->belongsTo('App/PurchaseState', 'state_id');
    }

    public function items()
    {
        return $this->hasMany('App/Item');
    }

}
