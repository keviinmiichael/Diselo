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
        $query->select(\DB::raw('clients.*'))
            ->take(request('length'))
            ->skip(request('start'))
        ;
    }

    /**
    * Observaciones:
    *
    * Dentro del select al hacer por ejemplo: purchases.total lo que estamos haciendo es un request al
    * mysql en donde solicitamos la columna total de la tabla purchase. Todo lo que sucede acá tiene que
    * poder ser comprendido por mysql. Cosas como purchases.client no son sql válido, porque si bien
    * para laravel existe la relación entre un purchase y un client, para mysql no existe la columna
    * client en la tabla purchases.
    *
    * Otra cosa, (me olvidé de avisarte, mala mía) yo usó un scope para abreviar los join. Ese scope es
    * unite. Unite recibe el nombre de la relación. Sólo se pueden hacer unites con relaciones válidas.
    * Por ejemplo, total no es una relación del modelo Client.
    *
    * Por último, como estamos usando un select tenemos que indicar que columnas queremos devolver. Eloquent
    * por más que estemos trabajando sobre el modelo client, no trae por defecto las columnas de este modelo.
    * Eso lo tenemos que hacer nosotros "a mano" haciendo clients.*
    */

    /*
    public function scopeDt($query)
    {
        $query->select(\DB::raw('purchases.total as total, purchases.client as client, purchases.state as state'))
            ->unite('total')
            ->unite('client')
            ->unite('state')
            ->take(request('length'))
            ->skip(request('start'));
    }
    */


}
