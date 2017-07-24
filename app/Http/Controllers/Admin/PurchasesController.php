<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Purchase;
use App\Http\Controllers\Controller;

class PurchasesController extends Controller
{

	 public function json()
	 {
		 $data = Purchase::dt()->search()->get();
		 $recordsTotal = Purchase::count();
		 $recordsFiltered = Purchase::search()->count();
		 return compact('data', 'recordsTotal', 'recordsFiltered');
	 }

    public function index()
    {
		 return view('admin.categories.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
		 Purchase::create(request()->all());
		 return redirect('admin/products');
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
