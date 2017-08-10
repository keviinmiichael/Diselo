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
									<option value="0" selected>Selecciona Color</option>
									@foreach ($color as $key => $value)
										<option value="{{$key}}">{{$value}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="control-label text-uppercase">Talle:</label>
								<div class="radio">
									@foreach ($size as $key => $value)
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="{{$key}}" checked>
										{{$value}}
									</label>
									@endforeach
								</div>
							</div>

							<div class="form-group">
								<label class="control-label text-uppercase" for="input-quantity">Cantidad:</label>
								<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
							</div>
							<div class="cart-button button-group">
								<a data-remodal-target="modal" class="btn btn-cart">
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

	<div class="remodal" data-remodal-id="modal">
	 	<button data-remodal-action="close" class="remodal-close"></button>
	 	div.
	 	<div class="row">
	 		<div class="col-md-4">
	 			<select name="asdf" id="asfd" class="form-control">
	 				<option value="adsf">Elegir color</option>
	 				<option value="safd">asdf</option>
	 				<option value="df">fasd</option>
	 			</select>
	 		</div>
	 		<div class="col-md-4">
	 			<select name="asdf" id="asfd" class="form-control">
	 				<option value="adsf">asfd</option>
	 				<option value="safd">asdf</option>
	 				<option value="df">fasd</option>
	 			</select>
	 		</div>
	 		<div class="col-md-4">
	 			asdf
	 		</div>
	 		<div class="col-md-4">
	 			<span class="fa fa-plus"></span>
	 		</div>
	 	</div>
	 	<button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
	 	<button data-remodal-action="confirm" class="remodal-confirm">Agregar</button>
	</div>

@endsection
