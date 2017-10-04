<?php

namespace App;

use App\CustomClasses\ToForm;
use App\CustomClasses\Unite;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes, Sluggable, Unite, ToForm;

    protected $fillable = ['name', 'slug', 'category_id'];

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function products()
    {
      return $this->hasMany('App\Product');
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    public static function toSelect($category_id)
    {
        $subcategories = Category::find($category_id)->subcategories;
        $html = '<select class="form-control" name="subcategory_id" id="subcategory">';
        $html .= '<option value="">Seleccionar</option>';
        foreach ($subcategories as $subcategory) {
            $html .= '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
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
}
