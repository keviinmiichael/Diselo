<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Item;
use App\Product;

class IndexController extends Controller
{
	public function index()
	{	$start = Carbon::now()->startOfMonth()->toDateString();
		$end = Carbon::now()->endOfMonth()->toDateString();
		$query = Item::select(\DB::raw('count(product_id) as total, product_id'))
		->unite('purchase')
		->unite('product')
		->where('products.is_visible', 1)
		->groupBy('product_id')
		->orderBy('total', 'desc')
		->take(4);

		$products = $query->whereBetween('purchases.created_at', [$start, $end])->get();
		if (!$products->count()) $products = $query->get();
		$ids = $products->map(function ($item, $key) {return $item->product_id;});
		$productos = Product::whereIn('id', $ids->toArray())->get();
 		return view('front.index', compact('productos'));
	}
}
