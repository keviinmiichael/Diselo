@extends('front.app')

@section('title', 'Diselo')
@section('description', 'home')


@section('links')
	<link rel="stylesheet" type="text/css" href="/css/front/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/css/front/slick/slick-theme.css"/>
@endsection


@section('body')
	<!-- Main Container Starts -->
		<div class="main-container container">
		<!-- Featured Products Starts -->
			<section class="products-list">
			<!-- Heading Starts -->
				<h2 class="product-head">Últimos Prodúctos</h2>
			<!-- Heading Ends -->

			<!-- Products Row Starts -->
			<div class="news">
				<!-- Product #1 Starts -->
				@foreach ($nuevos as $producto)
					<div class="col-md-3 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="/content/products/250x320/{{$producto->thumb}}" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="/productos/{{$producto->slug}}">{{$producto->name}} </a></h4>
								<div class="description">
									{{ str_limit($producto->description, $limit=30, $end = '...') }}
								</div>
								<div class="price">
									<span class="price-new">{{$producto->price}}</span>
								</div>
								<div class="cart-button button-group">
									<button type="button" class="btn btn-cart">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</button>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<!-- Product #1 Ends -->
			</div>
		<!-- Featured Products Ends -->
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
				<h2 class="product-head">Productos más vendidos</h2>
			<!-- Heading Ends -->

			<div class="sellers">
				<!-- Product #1 Starts -->
				@foreach ($masvendidos as $producto)
					<div class="col-md-3 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="/content/products/250x320/{{$producto->thumb}}" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="/productos/{{$producto->slug}}">{{$producto->name}} </a></h4>
								<div class="description">
									{{ str_limit($producto->description, $limit=30, $end = '...') }}
								</div>
								<div class="price">
									<span class="price-new">{{$producto->price}}</span>
								</div>
								<div class="cart-button button-group">
									<button type="button" class="btn btn-cart">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</button>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<!-- Product #1 Ends -->
			</div>
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

@section('scripts')
	<script src="/js/front/slick/slick.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.sellers, .news').slick({
			  dots: true,
			  infinite: true,
			  slidesToShow: 4,
			  slidesToScroll: 1,
			  responsive: [
			    {
			      breakpoint: 1045,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ]
			});
		});
	</script>
@endsection
