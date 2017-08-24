<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Controllers\Controller;

class ColorsController extends Controller
{

    public function json()
    {
        $data = Color::dt()->search()->get();
        $recordsTotal = Color::count();
        $recordsFiltered = Color::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.colors.index');
    }

    public function create()
    {
        $color = new Color;
        return view('admin.colors.form', compact('color'));
    }

    public function store()
    {
        Color::create(request()->all());
        return redirect('admin/colors#new');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.form', compact('color'));
    }

    public function update(Color $color)
    {
        $color->update(request()->all());
        return redirect('admin/colors#edit');
    }

    public function destroy(Color $color)
    {
        $response = ['success' => false, 'error' => 'No se pueden borrar colores que tienen productos asignados'];
        if (!$color->stocks()->count()) {
            $color->delete();
            $response = ['success' => true];
        }
        return $response;
    }
}
