<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseState extends Model
{
    protected $fillable = ['value'];

    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'state_id');
    }
}
