<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use App\Purchase;
use Illuminate\Http\Request;

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

    public function show(Purchase $purchase)
    {
        return view('admin.purchases.show', compact('purchase'));
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

    public function itemsToJson()
    {
        $data = Item::where('purchase_id', request('purchase_id'))->dt()->search()->get();
        $recordsTotal = Item::where('purchase_id', request('purchase_id'))->count();
        $recordsFiltered = Item::where('purchase_id', request('purchase_id'))->search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }
}
