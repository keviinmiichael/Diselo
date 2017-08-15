<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{

	public function index()
	{
		$masvendidos = Product::bestsellers(20);
		$nuevos = Product::visible()->orderBy('id', 'desc')->take(20)->get();
		return view('front.index', compact('masvendidos','nuevos'));
	}

}
