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
					<a href="images/product-images/big-pimg1.jpg">
						<img src="images/product-images/pimg3.jpg" alt="Image" class="img-responsive thumbnail" />
					</a>
					<ul class="list-unstyled list-inline">
						<li>
							<a href="images/product-images/big-pimg2.jpg">
								<img src="images/product-images/thumb1.jpg" alt="Image" class="img-responsive thumbnail" />
							</a>
						</li>
						<li>
							<a href="images/product-images/big-pimg3.jpg">
								<img src="images/product-images/thumb2.jpg" alt="Image" class="img-responsive thumbnail" />
							</a>
						</li>
						<li>
							<a href="images/product-images/big-pimg4.jpg">
								<img src="images/product-images/thumb3.jpg" alt="Image" class="img-responsive thumbnail" />
							</a>
						</li>
						<li>
							<a href="images/product-images/big-pimg4.jpg">
								<img src="images/product-images/thumb4.jpg" alt="Image" class="img-responsive thumbnail" />
							</a>
						</li>
					</ul>
				</div>
			<!-- Left Ends -->
			<!-- Right Starts -->
				<div class="col-sm-8 product-details">
					<div class="panel-smart">
					<!-- Product Name Starts -->
						<h2>Digital Electro Goods</h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer">
							<li>
								<span>Brand:</span> Indian spices
							</li>
							<li><span>Model:</span> SKU012452</li>
							<li><span>Reward Points:</span> 300</li>
							<li>
								<span>Availability:</span> <strong class="label label-danger">Out Of Stock</strong>
							</li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						<div class="price">
							<span class="price-head">Price :</span>
							<span class="price-new">$199.50</span>
							<span class="price-old">$249.50</span>
							<p class="price-tax">Ex Tax: $279.99</p>
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
							{{-- <div class="form-group">
								<label class="control-label text-uppercase">Checkbox:</label>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="">
										Option one is this and that&mdash;be sure to include why it's great
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="" checked>
										Option two is checked
									</label>
								</div>
							</div> --}}
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
						<a href="#tab-description">Description</a>
					</li>
				</ul>
			<!-- Nav Tabs Ends -->
			<!-- Tab Content Starts -->
				<div class="tab-content clearfix">
				<!-- Description Starts -->
					<div class="tab-pane active" id="tab-description">
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
						<p>
							It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
