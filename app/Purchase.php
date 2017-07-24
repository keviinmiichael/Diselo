<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    use Unite;

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

	 //scopes
	 public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('purchases.client', 'like', request('search.value').'%')
                ->orWhere('purchases.state', 'like', request('search.value').'%')
                ->orWhere('purchases.paid', 'like', request('search.value').'%')
                ->orWhere('purchases.cost', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('clients.name as client, state.value as state, items.name as item,items.price as price'))
            ->unite('client')
            ->unite('state')
            ->unite('item')
            ->unite('price')
            ->take(request('length'))
            ->skip(request('start'));
    }

}
