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
        foreach (request('product_id') as $key => $product_id) {
            if (!$product_id) continue;
            for ($i=1; $i<=5; $i++) {
                if (!request("size_id_$i.$key")) continue;
                $stock = Stock::firstOrNew([
                    'product_id' => $product_id,
                    'size_id' => request("size_id_$i.$key"),
                    'color_id' => request("color_id.$key")
                ]);
                $stock->amount += request("amount.$key");
                $stock->save();
            }
            Product::where('id', $product_id)->update(['cost' => request("cost.$key")]);
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
