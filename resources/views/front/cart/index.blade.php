@extends('front.app')

@section('title', 'Diselo')
@section('description', 'home')


@section('body')
	<!-- Main Container Starts -->
	<div class="main-container container">
	<!-- Main Heading Starts -->
	<h2 class="main-heading text-center">
		Carrito
	</h2>
	<!-- Main Heading Ends -->
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
									<a href="product.html">
										<img src="/content/products/dd/{{$product->thumb}}" alt="{{$product->name}}" title="{{$product->name}}" class="img-thumbnail" />
									</a>
								</td>
								<td class="text-center">
									<a href="product-full.html">{{ $product->name }}</a>
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
							<h3 class="panel-title">
								Información de Envío
							</h3>
						</div>
						<div class="panel-body">
						<!-- Form Starts -->
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label for="inputFname" class="col-sm-3 control-label">Nombre :</label>
									<div class="col-sm-9">
										<input type="text" name="name" class="form-control" id="inputFname" placeholder="Nombre">
									</div>
								</div>
								<div class="form-group">
									<label for="inputFname" class="col-sm-3 control-label">Apellido :</label>
									<div class="col-sm-9">
										<input type="text" name="lastname" class="form-control" id="inputFname" placeholder="Apellido">
									</div>
								</div>
								<div class="form-group">
									<label for="inputFname" class="col-sm-3 control-label">Razón Social :</label>
									<div class="col-sm-9">
										<input type="text" name="business_name" class="form-control" id="inputFname" placeholder="Razón Social">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Telefono :</label>
									<div class="col-sm-9">
										<input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Telefono">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-sm-3 control-label">Email :</label>
									<div class="col-sm-9">
										<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress1" class="col-sm-3 control-label">Calle :</label>
									<div class="col-sm-9">
										<input type="text" name="street" class="form-control" id="inputAddress1" placeholder="Calle">
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress1" class="col-sm-3 control-label">Número :</label>
									<div class="col-sm-9">
										<input type="text" name="number" class="form-control" id="inputAddress1" placeholder="Número">
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress1" class="col-sm-3 control-label">Piso :</label>
									<div class="col-sm-9">
										<input type="text" name="floor" class="form-control" id="inputAddress1" placeholder="Piso">
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress1" class="col-sm-3 control-label">Depto :</label>
									<div class="col-sm-9">
										<input type="text" name="apartment" class="form-control" id="inputAddress1" placeholder="Depto">
									</div>
								</div>
								<div class="form-group">
									<label for="inputCity" class="col-sm-3 control-label">Barrio :</label>
									<div class="col-sm-9">
										<input type="text" name="neighborhood" class="form-control" id="inputCity" placeholder="Barrio">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPostCode" class="col-sm-3 control-label">Postal Code :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputPostCode" placeholder="Postal Code">
									</div>
								</div>
								<div class="form-group">
									<label for="inputCountry" class="col-sm-3 control-label">Localidad :</label>
									<div class="col-sm-9">
										<select class="form-control" id="inputCountry1">
											<option>- All Countries -</option>
											<option>India</option>
											<option>USA</option>
											<option>UK</option>
											<option>China</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputRegion" class="col-sm-3 control-label">Provincia :</label>
									<div class="col-sm-9">
										<select class="form-control" id="inputRegion1">
											<option>- All Regions -</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="checkbox col-sm-offset-2">
											<label><input type="checkbox" value="">Aceptar términos y condiciones</label>
									</div>
									<br>
									<div class="col-sm-offset-3 col-sm-9">
										<button type="button" id="myBtn" class="btn btn-black">
											Finalizar Compra
										</button>
									</div>
									<div id="myModal" class="modal">
									  <!-- Modal content -->
									  <div class="modal-content">
									    <div class="modal-header">
									      <h2>Gracias por comprar!</h2>
									    </div>
									    <div class="modal-body">
									      <p>Te falta realizar la transferencia para recibir tu compra!</p>
									      <p>Te enviamos un mail con los datos,solo tienes que avisarnos cuando este la transferencia realizada y nosotros nos encargamos del resto ! </p>
									    </div>
									    <div class="modal-footer">
									    <span class="close"><a href="#" class="round-button">OK</a></span>
									      <h3>Modal Footer</h3>
									    </div>
									  </div>
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


@endsection

@section('scripts')
	<script src="/js/front/cart.js"></script>
@endsection
