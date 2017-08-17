<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    public function byProvincia()
    {
        return Localidad::toSelect(request('provincia_id'));
    }
}
