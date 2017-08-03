<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategory;

class CartController extends Controller
{


    public function add()
    {
        return request('product_id');
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
