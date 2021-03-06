<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use Intervention\Image\Facades\Image;

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

    public function store(ColorRequest $request)
    {
        $color = new Color($request->all());
        $this->addImage($color);
        return redirect('admin/colors#new');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.form', compact('color'));
    }

    public function update(Color $color, ColorRequest $request)
    {
        $color->update($request->all());
        $this->addImage($color);
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

    private function addImage($color)
    {
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $imageName = str_slug($color->value) . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file);
            $image->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->crop(200, 200);
            $color->hex = null;
        } else {
            $imageName = str_slug($color->value) . '.jpg';
            $image = Image::canvas(200, 200, request()->input('hex'));
        }
        $image->save(public_path( '/content/colors/thumb/'.$imageName));
        $color->image = $imageName;
        $color->save();
    }
}
