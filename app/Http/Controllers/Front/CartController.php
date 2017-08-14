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
        $products = Product::whereIn('id', array_pluck(session('cart'), 'product_id'))->with('stocks')->get();
        return view('front.cart.index', compact('products'));
    }

    public function add()
    {
        for ($i=0, $l=count(request('product_id')); $i<$l; $i++) {
            session([
                'cart.'.'.'.request("product_id.$i").request("size.$i") => [
                    request("color_id.$i"), request("amount.$i")
                ] 
            ]);
        }
        return ['success' => true, 'totalItems' => count(session('cart'))];
    }


    public function remove()
    {
        $id = request('product_id');
        if (session()->has('cart') && session()->has("cart.$id")) session()->forget("cart.$id");
        return ['success' => true, 'totalItems' => count(session('cart'))];
    }

    private function existsCartItem()
    {
        $exists = false;
        if ( session()->has('cart') && ( $item = session()->has('cart.'.request('product_id')'.'.request('size_id'))) ) {
            $exists = in_array(request('color_id'), $item);
        }
        return $exists;
    }

}
