@extends('front.app')

@section('title', 'Diselo')
@section('description', 'Coso')

@section('breadcrumb')
	@parent
	<li class="active">Test</li>
@endsection


@section('body')
	@parent
	@section('content')
		<!-- Product #1 Starts -->
			<div class="col-md-4 col-sm-6">
				<div class="product-col">
					<div class="image">
						<img src="images/product-images/15.jpg" alt="product" class="img-responsive" />
					</div>
					<div class="caption">
						<h4><a href="product.html">Digital Electro Goods</a></h4>
						<div class="description">
							We are so lucky living in such a wonderful time. Our almost unlimited ...
						</div>
						<div class="price">
							<span class="price-new">$199.50</span>
							<span class="price-old">$249.50</span>
						</div>
						<div class="cart-button button-group">
							<button type="button" class="btn btn-cart">
								<i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
								Add to Cart
							</button>
							<button type="button" title="Wishlist" class="btn btn-wishlist">
								<i class="fa fa-heart"></i>
							</button>
							<button type="button" title="Compare" class="btn btn-compare">
								<i class="fa fa-bar-chart-o"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		<!-- Product #1 Ends -->
	@endsection

@endsection
