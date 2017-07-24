<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortController extends Controller
{
    public function sort($table)
    {
        for ($i=0, $l=count(request('orden')); $i<$l; $i++) {
            \DB::table($table)
                ->where('id', request("id.$i"))
                ->update(['order' => request("orden.$i")])
            ;
        }
    }
}
