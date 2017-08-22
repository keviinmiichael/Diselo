<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $fillable = ['value'];

	public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public static function toSelect()
    {
        $colores = self::all();
        $html = '<select name="color_id[]" style="padding: 5px 20px; width: 150px">';
        foreach ($colores as $color) {
            $html .= '<option value="'.$color->id.'">'.$color->value.'</option>';
        }
        $html .= '</select>';
        return $html;
    }


}
