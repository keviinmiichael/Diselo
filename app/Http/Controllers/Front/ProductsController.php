<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{


    public function index()
    {
        return view('admin.products.index');
    }



    public function show($id)
    {
        //
    }

}
