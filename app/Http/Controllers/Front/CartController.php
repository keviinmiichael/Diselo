<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategory;

class CartController extends Controller
{


    public function add()
    {
        $id = request('product_id');
        if (!session()->has('cart') || !in_array($id, session('cart'))) {
            session()->push('cart',  $id);
        } elseif ( ($key = array_search($id, session('cart'))) !== FALSE) {
            session()->forget("cart.$key");
        }
        return ['success' => true, 'totalItems' => count(session('cart'))];
    }


    public function remove($id)
    {
        //
    }


    public function update($id)
    {
        //
    }

}
