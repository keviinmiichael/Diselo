<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincia';

    //relationships
    public function localidades()
    {
        return $this->hasMany('App\Localidad');
    }
    //----------

    public static function toSelect()
    {
        $provincias = self::all();
        $html = '<select class="form-control" name="provincia_id" id="provincia">';
        $html .= '<option value="">Seleccionar</option>';
        foreach ($provincias as $provincia) {
            $html .= '<option value="'.$provincia->id.'">'.$provincia->value.'</option>';
        }
        $html .= '</select>';
        return $html;
    }
}
