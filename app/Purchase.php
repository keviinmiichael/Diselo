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
        return $this->belongsTo('App\Client');
    }

    public function state()
    {
        return $this->belongsTo('App\PurchaseState', 'state_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
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
        //Observaciones:
        //En el select va el nombre de la tabla, no de la relación, cambié state.value por purchases_states.value
        //También agregué purchase.*
        $query->select(\DB::raw('purchases.*, clients.name as client, purchases_states.value as state, items.name as item,items.price as price'))
            ->unite('client')
            ->unite('state')
            ->unite('items') //la relación es items, agregué una "s"
            //->unite('price') está mal, ver observaciones en App\Client.php
            ->groupBy('purchases.id') //cuando hay varios inner join (unite) puede ser que haga falta un groupby
            ->orderBy(request('order.0.column'), request('order.0.dir'))
            ->take(request('length'))
            ->skip(request('start'));
    }

}
