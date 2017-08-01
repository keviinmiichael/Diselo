<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function json()
    {
        $data = Product::dt()->search()->get();
        $recordsTotal = Product::count();
        $recordsFiltered = Product::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $product = new Product;
        $categories = ['null' => 'Elegir'] + \App\Category::pluck('name', 'id')->toArray();
        $subcategories = ['null' => 'Elegir'];
        return view('admin.products.form', compact('product', 'categories', 'subcategories'));
    }

    public function store()
    {
        Product::create(request()->all());
        return redirect('admin/products#new');
    }

    public function edit(Product $product)
    {
        $categories = ['null' => 'Elegir'] + \App\Category::pluck('name', 'id')->toArray();
        $subcategories = ['null' => 'Elegir'] + \App\Subcategory::where('category_id', $product->category_id)->pluck('name', 'id')->toArray();
        return view('admin.products.form', compact('product', 'categories', 'subcategories'));
    }

    public function update(Product $product)
    {
        $product->update(request()->all());
        $this->addImages($product);
        if (request()->ajax()) return $product->toArray();
        return redirect('admin/products#edit');
    }

    public function destroy($id)
    {
        //
    }

    private function addImages($product)
    {
        //slider
        if (request()->has('imagesIds')) {
            $images = \App\Image::whereIn('id', request('imagesIds'));
            $product->images()->saveMany($images->get());
            $images->update(['pending'=>0]);
        }
        $product->save();
    }
}
