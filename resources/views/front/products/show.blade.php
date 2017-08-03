@extends('front.app')

@section('title', 'Diselo')
@section('description', 'Coso')

@section('breadcrumb')
	@parent
	<li class="active">Test</li>
@endsection


@section('body')
	<!-- Main Container Starts -->
		<div class="main-container inner container">
		<!-- Product Info Starts -->
			<div class="row product-info full">
			<!-- Left Starts -->
				<div class="col-sm-4 images-block">
						<img src="/content/products/250x320/{{$product->thumb}}" alt="Image" class="img-responsive thumbnail" />
					<ul class="list-unstyled list-inline">
					@foreach ($product->images as $image)
						<li style="width:77px">
								<img src="/content/products/thumb/{{$image->src}}" alt="Image" class="img-responsive thumbnail" />
						</li>
					@endforeach
					</ul>
				</div>
			<!-- Left Ends -->
			<!-- Right Starts -->
				<div class="col-sm-8 product-details">
					<div class="panel-smart">
					<!-- Product Name Starts -->
						<h2>{{$product->name}}</h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer">
							<li><span>Modelo:</span> {{$product->code}}</li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						<div class="price">
							<span class="price-head">Precio :</span>
							<span class="price-new">${{$product->price}}</span>
						</div>
					<!-- Price Ends -->
						<hr />
					<!-- Available Options Starts -->
						<div class="options">
							<h3>Especificaciones</h3>
							<div class="form-group">
								<label for="select" class="control-label text-uppercase">Color:</label>
								<select name="select" id="select" class="form-control">
									<option value="1" selected>Color 1</option>
									<option value="2">Color 2</option>
									<option value="3">Color 3</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label text-uppercase">Talle:</label>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
										XS
									</label>
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
										S
									</label>
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
										M
									</label>
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
										L
									</label>
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
										XL
									</label>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label text-uppercase" for="input-quantity">Cantidad:</label>
								<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
							</div>
							<div class="cart-button button-group">
								<button type="button" title="Wishlist" class="btn btn-wishlist">
									<i class="fa fa-heart"></i>
								</button>
								<button type="button" title="Compare" class="btn btn-compare">
									<i class="fa fa-bar-chart-o"></i>
								</button>
								<button type="button" class="btn btn-cart">
									<i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
									Add to Cart
								</button>
							</div>
						</div>
					<!-- Available Options Ends -->
					</div>
				</div>
			<!-- Right Ends -->
			</div>
		<!-- Product Info Ends -->
		<!-- Tabs Starts -->
			<div class="tabs-panel panel-smart">
			<!-- Nav Tabs Starts -->
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab-description">Descripcion</a>
					</li>
				</ul>
			<!-- Nav Tabs Ends -->
			<!-- Tab Content Starts -->
				<div class="tab-content clearfix">
				<!-- Description Starts -->
					<div class="tab-pane active" id="tab-description">
						<p>
							{{$product->description}}
						</p>

					</div>
				<!-- Description Ends -->
				</div>
			<!-- Tab Content Ends -->
			</div>
		<!-- Tabs Ends -->
		@include('front.asides.relatedproducts')
		</div>
	<!-- Main Container Ends -->

@endsection
