<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function create()
    {
        $autocompleteProviders = $this->getAutocompleProviders();
        return view('admin.stock.form', $autocompleteProviders);
    }

    public function store()
    {
        $items = json_decode(str_replace("'", '"', stripslashes( request('items') )) );
        foreach ($items->items as $item) {
            if (!$item->product_id) continue;
            $stock = Stock::firstOrNew(['product_id' => $item->product_id, 'size_id' => $item->size_id]);
            $stock->amount += $item->amount;
            $stock->save();
            Product::where('id', $item->product_id)->update(['cost' => $item->cost]);
        }
        return redirect('admin/products#stock');
    }

    private function getAutocompleProviders()
    {
        $codesAutocomplete = Product::select(\DB::raw('products.*, code as label'))->orderBy('code')->get();
        $namesAutocomplete = Product::select(\DB::raw('products.*, name as label'))->orderBy('name')->get();
        return compact('codesAutocomplete', 'namesAutocomplete');
    }
}
