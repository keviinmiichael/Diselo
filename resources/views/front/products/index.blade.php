@extends('front.app')

@section('title', 'Listado de proudctos')
@section('description', 'Indumentaria - Remeras, vestidos, pantalones')

@section('breadcrumb')
	@parent
	<li class="active">Productos</li>
@endsection


@section('body')
	@parent
	@section('content')
        @forelse($products as $product)
            <div class="col-md-4 col-sm-6">
                <div class="product-col">
                    <div class="image">
                        <img src="/content/products/250x320/{{$product->thumb}}" alt="{{$product->name}}" class="img-responsive" />
                    </div>
                    <div class="caption">
                        <h4><a href="productos/{{$product->slug}}">{{$product->name}}</a></h4>
                        <div class="description">
                            {{str_limit($product->description, 80)}}
                        </div>
                        <div class="price">
                            <span class="price-new">$ {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="cart-button button-group">
                            @if(session()->has('cart') && in_array($product->id, session('cart')))
                                <button type="button" class="btn btn-cart" data-action="remove" data-id="{{$product->id}}">
                                    <i class="fa fa-trash"></i>
                                    <span>Remover</span>
                                </button>
                            @else
                                <button type="button" class="btn btn-cart" data-action="add" data-id="{{$product->id}}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Agregar al carrito</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1>Por el momento no contamos con stock para estos productos. Volvé a visitarnos en breve.</h1>
        @endforelse
        {{ $products->links() }}
	@endsection
@endsection
