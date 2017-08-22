<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Stock;
use App\Color;
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
        $this->addRelation($product);
        return view('front.products.show', compact('product', 'availableSizes', 'availableColors', 'availableStock'));
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

    public function getStock(Product $product)
    {
        $availableColors = $product->availableColors(request('size_id'));
        $color_id = (request()->has('color_id')) ? request('color_id') : $availableColors->first()->id;
        $availableStock = $product->availableStock(request('size_id'), $color_id);
        return compact('availableColors', 'availableStock');
    }

	public function search()
	{
        $products = Product::select('products.*')
            ->where('products.name', 'like', '%'.request('search').'%')
			->unite('category')
			->unite('subcategory', true)
			->orWhere('categories.name', 'like', '%'.request('search').'%')
			->orWhere('subcategories.name', 'like', '%'.request('search').'%')
			->visible()
            ->paginate();
		return view('front.products.index', compact('products'));
	}

    public function addRelation($product)
    {
        if (session()->has('relation.origin') && session('relation.origin') != $product->id) {
            $product->addRelated(session('relation.origin'));
        }
        if (!session()->has('relation.origin') || session('relation.origin') != $product->id) {
            session()->put('relation.origin', $product->id);
        }
    }

}
