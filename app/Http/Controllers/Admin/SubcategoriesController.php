<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategory;

class SubcategoriesController extends Controller
{
	 public function json()
	 {
		  $data = Subcategory::dt()->search()->get();
		  $recordsTotal = Subcategory::count();
		  $recordsFiltered = Subcategory::search()->count();
		  return compact('data', 'recordsTotal', 'recordsFiltered');
	 }

    public function index()
    {
		 return view('admin.subcategories.index');
    }

	 public function create($category_id)
    {
		 $subcategory = new Subcategory;
		 return view('admin.subcategories.form', compact('subcategory', 'category_id'));
	 }


    public function store()
    {
		 Subcategory::create(request()->all());
		 return redirect('admin/categories');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
