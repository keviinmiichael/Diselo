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

    public function show($id)
    {
    }

    public function update(Purchase $purchase)
    {
        $purchase->update(request()->all());
        if (request()->ajax()) return $purchase->toArray();
        return redirect('admin/purchase#edit');
    }


    public function destroy($id)
    {
        //
    }
}
