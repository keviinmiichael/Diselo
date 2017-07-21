<?php

namespace App\CustomClasses;

trait ToForm {

    public static function toSelect($firsOption=[], $selectable=0)
    {
        $items = ($selectable) ? self::where('id', $selectable) : self::all();
        return $firsOption + $items->pluck('name', 'id')->toArray();
    }

}
