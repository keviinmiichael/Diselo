<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidad';

    //relationships
    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }
    //----------

    public static function toSelect($provincia_id)
    {
        $localidades = Provincia::find($provincia_id)->localidades;
        $html = '<select class="form-control" name="localidad_id" id="localidad">';
        $html .= '<option value="">Seleccionar</option>';
        foreach ($localidades as $localidad) {
            $html .= '<option value="'.$localidad->id.'">'.$localidad->value.'</option>';
        }
        $html .= '</select>';
        return $html;
    }
}
