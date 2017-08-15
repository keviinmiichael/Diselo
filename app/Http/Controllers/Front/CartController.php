<?php

namespace App\Http\Controllers\Front;

use App\Client;
use App\Http\Controllers\Controller;
use App\Item;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function show()
    {
        $ids = (session()->has('cart')) ? array_keys(session('cart')) : [];
        $products = Product::whereIn('id', $ids)->with('stocks')->get();
        return view('front.cart.index', compact('products'));
    }

    public function add()
    {
        for ($i=0, $l=count(request('size')); $i<$l; $i++) {
            $index = 'cart.'.request("product_id").'.'.request("size.$i");
            $items = (session()->has($index)) ? session($index) : [];
            $items[request("color.$i")] = [request("color.$i"), request("amount.$i")];
            session([$index => $items]);
        }
        return ['success' => true, 'totalItems' => count(session('cart'))];
    }


    public function remove()
    {
        $index = 'cart.'.request('product_id').'.'.request('size_id').'.'.request('color_id');
        if (session()->has('cart') && session()->has($index)) {
            session()->forget($index);
            if (!count(session('cart.'.request('product_id').'.'.request('size_id')))) {
                session()->forget('cart.'.request('product_id').'.'.request('size_id'));
            }
            if (!count(session('cart.'.request('product_id')))) {
                session()->forget('cart.'.request('product_id'));
            }
        }
        return ['success' => true, 'totalItems' => count(session('cart'))];
    }

    public function refresh()
    {
        $index = 'cart.'.request('product_id').'.'.request('size_id');
        $items = session($index);
        foreach ($items as $key => $item) {
            if ($item[0] == request('color_id')) break;
        }
        $items[$key] = [request('color_id'), request('amount')];
        session([$index => $items]);
        return ['success' => true];
    }

    public function buy()
    {
        $client = Client::create(request()->all());
        $item = new Item;
        foreach (session('cart') as $product_id => $sizes) {
            $product = Product::find($product_id);
            foreach ($sizes as $size => $cartItems) {
                foreach ($cartItems as $cartItem) {
                    $item->name = $product->price;
                    $item->cost = $product->cost;
                    $item->amount = $cartItems[1];
                }
            }
        }
        
    }

}
