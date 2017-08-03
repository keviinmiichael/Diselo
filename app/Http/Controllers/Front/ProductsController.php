<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{


    public function index()
	{
        $products = Product::visible()->paginate(6);
        return view('front.products.index', compact('products'));
	}

    public function show($product)
	{
		$product = \App\Product::where('slug', $product)->firstOrFail();
        return view('front.products.show', compact('product'));
	}

    public function byCategory($category)
    {
        $category = \App\Category::where('slug', $category)->firstOrFail();
        $products = Product::visible()->where('category_id', $category->id)->paginate(6);
        return view('front.products.index', compact('products'));
    }

    public function bySubcategory($category, $subcategory)
    {
        $subcategory = \App\Subcategory::where('slug', $subcategory)->firstOrFail();
        $products = Product::visible()->where('subcategory_id', $subcategory->id)->paginate(6);
        return view('front.products.index', compact('products'));
    }

}
