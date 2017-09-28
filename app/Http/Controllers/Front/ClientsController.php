<?php

namespace App\Http\Controllers\Front;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function create()
    {
        if (\Auth::guard('clients')->check()) return redirect('/');
        $client = new Client;
        $formOptions = ['method' => 'post', 'url' => '/clients/', 'class' => 'form-horizontal', 'id' => 'form'];
        return view('front.clients.form', compact('client', 'formOptions'));
    }

    public function store(ClientRequest $request)
    {
        $client = new Client(request()->all());
        $client->password = bcrypt(request()->password);
        $client->save();
        return ['success' => true, 'redirect' => '/#new'];
    }

    public function edit(Product $product)
    {
        $categories = ['null' => 'Elegir'] + \App\Category::pluck('name', 'id')->toArray();
        $subcategories = ['null' => 'Elegir'] + \App\Subcategory::where('category_id', $product->category_id)->pluck('name', 'id')->toArray();  
        return view('admin.products.form', compact('product', 'categories', 'subcategories'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        if (request()->ajax()) {
            $product->is_visible = request()->is_visible;
            $product->save();
            return $product->toArray();
        }
        if (empty($request->price)) $request->price = ceil($request->cost * $request->profit_margin / 100 + $request->cost);
        $product->update($request->all());
        $this->addImages($product);
        return redirect('admin/products#edit');
    }

    public function getLogin()
    {
        return view('front.clients.login');
    }

    public function postLogin()
    {
        $credentials = ['password' => request()->password, 'email' => request()->email];
        if (\Auth::guard('clients')->attempt($credentials)) {
            return redirect('/');
        } else {
            request()->session()->flash('error', 'El usuario o la contraseña son incorrectos.');
            return redirect('clients/login');
        }
    }

    public function logout()
    {
        \Auth::guard('clients')->logout();
        return redirect('/');
    }
}
