<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use Unite;

    protected $fillable = ['src','imageable_id','imageable_type','is_video','pending','order','title','caption','url'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public static function nextId ()
    {
        if (!$imagen = self::select('id')->orderBy('id', 'desc')->first()) {
            $imagen = new self();
            $imagen->id = 0;
        }
        return $imagen->id + 1;
    }

}
