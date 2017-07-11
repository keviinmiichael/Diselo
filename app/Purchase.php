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
    public function purchases_states()
    {
        return $this->belongsTo('App/Purchases_states');
    }
    public function item()
    {
        return $this->belongsTo('App/Item');
    }

}
