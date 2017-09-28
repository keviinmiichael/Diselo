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

    public static function toSelect($object = false)
    {
        $provincia_id = ($object) ? $object->provincia_id : 0;
        $provincias = self::all();
        $html = '<select class="form-control" name="provincia_id" id="provincia">';
        $html .= '<option value="">Seleccionar</option>';
        foreach ($provincias as $provincia) {
            $selected = ($provincia->id == $provincia_id) ? 'selected' : '';
            $html .= '<option value="'.$provincia->id.'" '.$selected.'>'.$provincia->value.'</option>';
        }
        $html .= '</select>';
        return $html;
    }
}
