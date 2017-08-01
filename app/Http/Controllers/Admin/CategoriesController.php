<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function json()
    {
        $data = Category::dt()->search()->get();
        $recordsTotal = Category::count();
        $recordsFiltered = Category::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.categories.index');
    }


    public function create()
    {
		 $category = new Category;
		 return view('admin.categories.form', compact('category'));
	 }


    public function store()
    {
		 Category::create(request()->all());
		 return redirect('admin/categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return 'test';
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //$category = Category::find($id);
        //$category->delete();
        return ['success' => false, 'error' => 'No se pueden borrar categorías que tienen productos asignados'];
    }
}
