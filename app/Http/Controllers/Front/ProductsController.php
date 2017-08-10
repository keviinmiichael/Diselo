<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Stock;
use App\Color;
use App\Product;

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
		$color = \App\Color::join('stock', 'colors.id', '=', 'stock.color_id')->where('stock.product_id', $product->id)->pluck('value', 'id');
		$size = \App\Size::join('stock', 'sizes.id', '=', 'stock.size_id')->where('stock.product_id', $product->id)->pluck('value', 'id');
        return view('front.products.show', compact('product', 'color', 'size'));
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
