<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use SoftDeletes, Unite;

    protected $fillable = ['name','email','street','number','floor','aparment','zip_code','localidad_id','provincia_id'];

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }

	 //scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('clients.name', 'like', request('search.value').'%')
                ->orWhere('clients.email', 'like', request('search.value').'%')
                ->orWhere('clients.street', 'like', request('search.value').'%')
                ->orWhere('clients.localidad', 'like', request('search.value').'%')
                ->orWhere('clients.provincia', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('purchases.total as total, purchases.client as client, purchases.state as state'))
            ->unite('total')
            ->unite('client')
            ->unite('state')
            ->take(request('length'))
            ->skip(request('start'));
    }


}
