@extends('front.app')

@section('title', 'Diselo')
@section('description', 'Coso')

@section('breadcrumb')
	@parent
	<li class="active">Productos</li>
@endsection


@section('body')
	@parent
	@section('content')
        @foreach($products as $product)
            <div class="col-md-4 col-sm-6">
                <div class="product-col">
                    <div class="image">
                        <img src="/content/products/250x320/{{$product->thumb}}" alt="{{$product->name}}" class="img-responsive" />
                    </div>
                    <div class="caption">
                        <h4><a href="products/{{$product->slug}}">{{$product->name}}</a></h4>
                        <div class="description">
                            {{str_limit($product->description, 80)}}
                        </div>
                        <div class="price">
                            <span class="price-new">$ {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="cart-button button-group">
                            <button type="button" class="btn btn-cart">
                                <i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $products->links() }}
	@endsection
@endsection
