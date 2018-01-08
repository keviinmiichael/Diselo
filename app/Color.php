<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $fillable = ['value', 'hex'];
    public $timestamps = false;

	public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function stocks()
    {
      return $this->hasMany('App\Stock');
    }

    public static function toSelect()
    {
        $colores = self::all();
        $html = '<select name="color_id[]" style="padding: 5px 20px; width: 150px" class="selectpicker">';
        foreach ($colores as $color) {
            $html .= '<option value="'.$color->id.'" data-thumbnail="/content/colors/thumb/'.$color->image.'">'.$color->value.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    //scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('name', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->take(request('length'))->skip(request('start'));
    }
    //------

}
