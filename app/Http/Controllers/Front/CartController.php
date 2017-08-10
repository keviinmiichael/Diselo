<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function show()
    {
        //dd(session('cart.1'));
        $products = Product::whereIn('id', array_pluck(session('cart'), 'product_id'))->with('stocks')->get();
        return view('front.cart.index', compact('products'));
    }

    public function add()
    {
        $id = request('product_id');
        if (!session()->has('cart') || !session()->has("cart.$id")) {
            session()->put("cart.$id",  ['product_id' => $id, 'amount' => 1]);
        }
        return ['success' => true, 'totalItems' => count(session('cart'))];
    }


    public function remove()
    {
        $id = request('product_id');
        if (session()->has('cart') && session()->has("cart.$id")) session()->forget("cart.$id");
        return ['success' => true, 'totalItems' => count(session('cart'))];
    }

}
