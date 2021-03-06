<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Authenticatable
{

    use SoftDeletes, Unite;

    protected $fillable = ['name','lastname','business_name','phone','email','street','number','floor','apartment','neighborhood','zip_code','localidad_id','provincia_id'];

    public function getAddress()
    {
        $address = ' ' . $this->street . ' ' . $this->number . '<br>';
        if ($this->floor) $address .= ' piso:' . $this->floor;
        if ($this->apartment) $address .= '  departamento:' . $this->apartment . '<br>';
        if ($this->neighborhood) $address .= ' barrio:' . $this->neighborhood . '<br>';
        $address .= $this->provincia->value . ', ' . $this->localidad->value . '<br>';
        $address .= 'CP: ' . $this->zip_code;
        return $address;
    }

    //relationships
    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }

    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
    //----------

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
        $query->select(\DB::raw('clients.*'))
            ->take(request('length'))
            ->skip(request('start'))
        ;
    }
    //----------



}
