@extends('front.app')

@section('title', 'Listado de proudctos')
@section('description', 'Indumentaria - Remeras, vestidos, pantalones')

@section('breadcrumb')
	@parent
	@if (isset($category))
        <li><a href="/productos">Productos</a></li>
        <li class="active">{{ $category->name }}</li>
    @elseif(isset($subcategory))
        <li><a href="/productos">Productos</a></li>
        <li><a href="/{{$subcategory->category->slug}}">{{$subcategory->category->name}}</a></li>
        <li class="active">{{ $subcategory->name }}</li>
    @else
        <li class="active">Productos</li>
    @endif
@endsection


@section('body')
	@parent
	@section('content')
        <div class="row">
            @forelse ($products as $product)
                @include('front.products._box')
            @empty
                @include('front.products._empty')
            @endforelse
        </div>
        <div class="text-center">
            {{ $products->appends($_GET)->links() }}
        </div>
	@endsection
@endsection

@section('scripts')
    <script src="/js/front/product.js"></script>
@endsection
