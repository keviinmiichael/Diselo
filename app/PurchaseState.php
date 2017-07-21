<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;

class PurchaseState extends Model
{
    use Unite;

    protected $fillable = ['value'];

    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'state_id');
    }
}
