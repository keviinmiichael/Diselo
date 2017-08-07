@extends('front.app')

@section('title', 'Diselo')
@section('description', 'home')




@section('body')
	<!-- Main Container Starts -->
		<div class="main-container container">
		<!-- Featured Products Starts -->
			<section class="products-list">
			<!-- Heading Starts -->
				<h2 class="product-head">Últimos Productos</h2>
			<!-- Heading Ends -->
			<!-- Products Row Starts -->
				<div class="row">
				<!-- Product Starts -->
				{{-- @foreach ($products as $product) --}}
					<div class="col-md-3 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/9.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product-full.html">Quis Nostrud Exercitation </a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">$199.50</span>
								</div>
								<div class="cart-button button-group">
									<button type="button" class="btn btn-cart">
										<i class="fa fa-shopping-cart"></i> Agregar al Carrito
									</button>
								</div>
							</div>
						</div>
					</div>
				{{-- @endforeach --}}
				<!-- Product Ends -->
				</div>
			<!-- Products Row Ends -->
			</section>
		<!-- Featured Products Ends -->
		<!-- Big Banner Starts -->
			<div class="full-banner">
				<img src="images/banners/big-banner.jpg" alt="Banner" class="img-responsive" />
			</div>
		<!-- Big Banner Ends -->
		</div>
	<!-- Main Container Ends -->
	<!-- Main Container Starts -->
		<div class="main-container container">
		<!-- Featured Products Starts -->
			<section class="products-list">
			<!-- Heading Starts -->
				<h2 class="product-head">Productos Más Vendidos</h2>
			<!-- Heading Ends -->
			<!-- Products Row Starts -->
				<div class="row">
				<!-- Product Starts -->
				{{-- @foreach ($products as $product) --}}
					<div class="col-md-3 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/9.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product-full.html">Quis Nostrud Exercitation </a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">$199.50</span>
								</div>
								<div class="cart-button button-group">
									<button type="button" class="btn btn-cart">
										<i class="fa fa-shopping-cart"></i> Agregar al Carrito
									</button>
								</div>
							</div>
						</div>
					</div>
				{{-- @endforeach --}}
				<!-- Product Ends -->
				</div>
			<!-- Products Row Ends -->
			</section>
		<!-- Featured Products Ends -->
		<!-- 2Col Banners Starts -->
			<div class="col2-banners">
				<div class="row">
					<div class="col-sm-5 col-xs-12">
						<img src="images/banners/banner-img1.png" alt="Banner Image" class="img-responsive" />
					</div>
					<div class="col-xs-12 hidden-lg hidden-md hidden-sm">
						<br>
					</div>
					<div class="col-sm-7 col-xs-12">
						<img src="images/banners/banner-img2.png" alt="Banner Image" class="img-responsive" />
					</div>
				</div>
			</div>
		<!-- 2Col Banners Ends -->
		</div>
	<!-- Main Container Ends -->


@endsection
