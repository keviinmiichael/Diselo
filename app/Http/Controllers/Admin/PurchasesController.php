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
		 return view('admin.purchases.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
		 Purchase::create(request()->all());
		 return redirect('admin/products');
    }

    /**
    * Observaciones:
    * El Método show solamente debe mostrar la vista individual de un recurso.
    * Para hacer la persistencia de un recurso se hace en el método store.
    * En este caso show mostraría la vista de una compra, que consiste en una tabla
    * con el listado de todos los "items" que fueron comprados.
    */
    public function show($id)
    {
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
