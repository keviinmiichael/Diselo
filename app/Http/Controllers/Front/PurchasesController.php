<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Purchase;
use App\Http\Controllers\Controller;

class PurchasesController extends Controller
{


    public function index()
    {
		 return view('admin.purchases.index');
    }


    public function show($id)
    {

    }

}
