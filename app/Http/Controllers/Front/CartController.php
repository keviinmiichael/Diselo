<?php

namespace App\Http\Controllers\Front;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Item;
use App\Product;
use App\Purchase;
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

    public function buy(ClientRequest $request)
    {
        if (!session()->has('cart')) return ['success' => false];

        $products = Product::whereIn('id', array_keys(session('cart')))->get();
        $itemsCollection = collect();

        $total = 0;
        $cost = 0;
        
        foreach ($products as $product) {
            foreach (session('cart.'.$product->id) as $size => $cartItems) {
                foreach ($cartItems as $cartItem) {
                    $item = new Item;
                    $item->name = $product->name;
                    $total += $item->price = $product->price;
                    $cost += $item->cost = $product->cost;
                    $item->amount = $cartItem[1];
                    $item->product_id = $product->id;
                    $itemsCollection->push($item);
                }
            }
        }

        $client = Client::create(request()->all());

        $purchase = Purchase::create([
            'total' => $total,
            'cost' => $cost,
            'client_id' => $client->id
        ]);

        $purchase->items()->saveMany($itemsCollection);

        return ['success' => true];

    }

}
