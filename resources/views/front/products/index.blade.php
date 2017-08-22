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
        @forelse ($products as $product)
            @include('front.products._box')
        @empty
            @include('front.products._empty')
        @endforelse
        {{ $products->links() }}
	@endsection
@endsection

@section('scripts')
    <script src="/js/front/product.js"></script>
@endsection
