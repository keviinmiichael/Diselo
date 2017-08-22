@extends('front.app')

@section('title', 'Diselo')
@section('description', 'home')


@section('body')
<!-- Main Container Starts -->
<div class="main-container container">
	
	<h2 class="main-heading text-center">Carrito</h2>
	
	<!-- Shopping Cart Table Starts -->
	<div class="table-responsive shopping-cart-table">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td class="text-center">
						Producto
					</td>
					<td class="text-center">
						Detalles
					</td>
					<td class="text-center">
						Talle
					</td>
					<td class="text-center">
						Color
					</td>
					<td class="text-center">
						Cantidad
					</td>
					<td class="text-center">
						Precio Unitario
					</td>
					<td class="text-center">
						Total
					</td>
					<td class="text-center">
						Remover
					</td>
				</tr>
			</thead>
			<!-- INICIO DE PRODUCTO -->
			<tbody>
				@forelse ($products as $product)
					@foreach (session('cart.'.$product->id) as $size => $items)
						 @foreach ($items as $item)
							<tr>
								<td class="text-center">
									<a href="/productos/{{$product->slug}}">
										<img style="width: 50px" src="/content/products/thumb/{{$product->thumb}}" alt="{{$product->name}}" title="{{$product->name}}" class="img-thumbnail" />
									</a>
								</td>
								<td class="text-center">
									<a href="/productos/{{$product->slug}}">{{ $product->name }}</a>
								</td>
								<td class="text-center">
									{{ \App\Size::find($size)->value }}
								</td>
								<td class="text-center">
									{{ \App\Color::find($item[0])->value }}
								</td>
								<td class="text-center">
									<div class="input-group btn-block">
										<input type="text" name="quantity" class="amount form-control" value="{{$item[1]}}" size="1" min="1" max="{{$product->availableStock($size, $item[0])->amount}}" data-product-id="{{$product->id}}" data-size-id="{{$size}}" data-color-id="{{$item[0]}}" />
									</div>
								</td>
								<td class="text-center price">
									$ {{ $product->price }}
								</td>
								<td class="text-center total">
									$
								</td>
								<td class="text-center">
									<a href="remover-producto" title="Remover" class="btn btn-default tool-tip" data-product-id="{{$product->id}}" data-size-id="{{$size}}" data-color-id="{{$item[0]}}">
										<i class="fa fa-times-circle"></i>
									</a>
								</td>
							</tr>
						@endforeach
					@endforeach
				@empty
					<tr>
						<td colspan="8">
							<p style="text-align: center; margin: 10px">No hay ningún producto seleccionado</p>
						</td>
					</tr>
				@endforelse
			</tbody>
			<tfoot>
				<tr>
				  <td colspan="6" class="text-right">
					<strong>Total :</strong>
				  </td>
				  <td colspan="2" class="text-left">
					<span class="total-final">calculando...</span>
				  </td>
				</tr>
			</tfoot>
		</table>
	</div>
	<!-- Shopping Cart Table Ends -->

	<!-- Shipping Section Starts -->
	<section class="registration-area">
		<div class="row">
			<!-- Shipping & Shipment Block Starts -->
			<div class="col-sm-6">
				<!-- Shipment Information Block Starts -->
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">Información de Envío</h3>
					</div>
					<div class="panel-body">
						<!-- Form Starts -->
						<form action="cart/buy" action="post" class="form-horizontal" role="form" id="form-cliente">
							<div class="form-group">
								<label for="inputFname" class="col-sm-3 control-label">Nombre :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('name') }}" name="name" class="form-control" id="inputFname" placeholder="Nombre">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputFname" class="col-sm-3 control-label">Apellido :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('lastname') }}" name="lastname" class="form-control" id="inputFname" placeholder="Apellido">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputFname" class="col-sm-3 control-label">Razón Social :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('business_name') }}" name="business_name" class="form-control" id="inputFname" placeholder="Razón Social">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPhone" class="col-sm-3 control-label">Teléfono :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="inputPhone" placeholder="Telefono">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-sm-3 control-label">Email :</label>
								<div class="col-sm-9">
									<input type="email" value="{{ old('email') }}" name="email" class="form-control" id="inputEmail" placeholder="Email">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress1" class="col-sm-3 control-label">Calle :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('street') }}" name="street" class="form-control" id="inputAddress1" placeholder="Calle">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress1" class="col-sm-3 control-label">Número :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('number') }}" name="number" class="form-control" id="inputAddress1" placeholder="Número">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress1" class="col-sm-3 control-label">Piso :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('floor') }}" name="floor" class="form-control" id="inputAddress1" placeholder="Piso">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress1" class="col-sm-3 control-label">Depto :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('apartment') }}" name="apartment" class="form-control" id="inputAddress1" placeholder="Depto">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputCity" class="col-sm-3 control-label">Barrio :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('neighborhood') }}" name="neighborhood" class="form-control" id="inputCity" placeholder="Barrio">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPostCode" class="col-sm-3 control-label">Código Postal :</label>
								<div class="col-sm-9">
									<input type="text" value="{{ old('zip_code') }}" name="zip_code" class="form-control" id="inputPostCode" placeholder="Código Postal">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="provincia" class="col-sm-3 control-label">Provincia :</label>
								<div class="col-sm-9">
									{!! \App\Provincia::toSelect() !!}
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="localidad" class="col-sm-3 control-label">
									<span style="display: none" class="fa fa-spin fa-spinner"></span> Localidad :
								</label>
								<div class="col-sm-9">
									<select class="form-control" value="{{ old('localidad_id') }}" name="localidad_id" id="localidad">
										<option>Seleccionar</option>
									</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="checkbox col-sm-offset-2">
									<label><input type="checkbox" value="">Aceptar términos y condiciones</label>
								</div>
								<br>
								<div class="col-sm-offset-3 col-sm-9">
									<button type="button" id="comprar" class="btn btn-black">
										Finalizar Compra
									</button>
								</div>
							</div>
						</form>
						<!-- Form Ends -->
					</div>
				</div>
				<!-- Shipment Information Block Ends -->
			</div>
			<!-- Shipping & Shipment Block Ends -->
		</div>
	</section>
	<!-- Shipping Section Ends -->
</div>
<!-- Main Container Ends -->

<div id="myModal" class="modal">
	<!-- Modal content -->
  	<div class="modal-content">
    	<div class="modal-header">
      		<h2 class="default">Estamos procesando tu compra</h2>
      		<h2 class="error" style="display: none">Error</h2>
    	</div>
	    <div class="modal-body">
	      	<p class="default">Por favor aguarda un momento.</p>
	      	<p class="error" style="display: none"></p>
	    </div>
	    <div class="modal-footer">
	    <span class="close"><a href="#" class="round-button">OK</a></span>
	      	<h3>Modal Footer</h3>
	    </div>
  	</div>
</div>

@endsection

@section('scripts')
	<script src="/js/front/cart.js"></script>
@endsection
