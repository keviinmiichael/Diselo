<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{

	 public function json()
	 {
		 $data = Client::dt()->search()->get();
		 $recordsTotal = Client::count();
		 $recordsFiltered = Client::search()->count();
		 return compact('data', 'recordsTotal', 'recordsFiltered');
	 }
    public function index()
    {
		 return view('admin.clients.index');
    }

    /**
    * Observaciones:
    * El Método create solamente debe mostrar el formlario de creación.
    * Para hacer la persistencia de un recurso se hace en el método store.
    */
    public function create()
    {
		 
	 }


    public function store(Request $request)
    {
		 Client::create(request()->all());
		 return redirect('admin/products');
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
