@extends('front.app')

@section('title', $product->name)
@section('description', $product->description)

@section('breadcrumb')
	@parent
	<li><a href="/productos">Productos</a></li>
	<li><a href="/{{$product->category->slug}}">{{$product->category->name}}</a></li>
	@if($product->subcategory_id) <li><a href="/{{$product->category->slug}}/{{$product->subcategory->slug}}">{{$product->subcategory->name}}</a></li> @endif
	<li class="active">{{$product->name}}</li>
@endsection

@section('body')
	@include('front.partials.breadcrumb')
	<!-- Main Container Starts -->
	<div class="main-container inner container">
	<!-- Product Info Starts -->
		<div class="row product-info full">
			<!-- Left Starts -->
			<div class="col-sm-4 images-block" >
				<a href="/content/products/big/{{$product->thumb}}">
					<img src="/content/products/250x320/{{$product->thumb}}" alt="{{$product->name}}" class="img-responsive thumbnail" />
				</a>
				<ul class="list-unstyled list-inline">
    				@foreach ($product->images as $image)
    					<li style="width:77px">
    						<a href="/content/products/big/{{$image->src}}">
    							<img src="/content/products/thumb/{{$image->src}}" alt="{{$product->name}}" class="img-responsive thumbnail" />
    						</a>
    					</li>
    				@endforeach
				</ul>
			</div>
			<!-- Left Ends -->

			<!-- Right Starts -->
			<div class="col-sm-8 product-details">
				<div class="panel-smart">
					<h2>{{$product->name}}</h2>
					<hr />
					<!-- Price Starts -->
					<div class="price">
						<span class="price-head">Precio :</span>
						<span class="price-new">${{$product->price}}</span>
					</div>
					<!-- Price Ends -->
					<hr />
					<!-- Available Options Starts -->
					<div class="description">
						<h3>Descripción</h3>
						{{ $product->description }}
					</div>
					<!-- Available Options Ends -->
					<!-- Available Options Starts -->
					<div class="options" style="margin-top: 10px">
						<div class="cart-button button-group">
							<a data-remodal-target="modal-{{$product->id}}" class="btn btn-cart">
								<i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
								Agregar al carrito
							</a>
						</div>
					</div>
					<!-- Available Options Ends -->
				</div>
			</div>
			<!-- Right Ends -->
		</div>
		<!-- Product Info Ends -->
		@include('front.asides.relatedproducts')
	</div>
	<!-- Main Container Ends -->

	@include('front.products.modal')

@endsection

@section('scripts')
	<script src="/js/front/product.js"></script>
@endsection
