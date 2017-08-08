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
								Cantidad
							</td>
							<td class="text-center">
								Precio Unitario
							</td>
							<td class="text-center">
								Total
							</td>
							<td class="text-center">
								Quitar
							</td>
						</tr>
					</thead>

					<!-- INICIO DE PRODUCTO -->
					<tbody>
						<tr>
							<td class="text-center">
								<a href="product.html">
									<img src="images/product-images/cart-thumb-img1.jpg" alt="Product Name" title="Product Name" class="img-thumbnail" />
								</a>
							</td>
							<td class="text-center">
								<a href="productos/">Digital Electro Goods</a>
							</td>
							<td class="text-center">
								<div class="input-group btn-block">
									<input type="text" name="quantity" value="1" size="1" class="form-control" />
								</div>
							</td>
							<td class="text-center">
								$150.00
							</td>
							<td class="text-center">
								$150.00
							</td>
							<td class="text-center">
								<button type="submit" title="Update" class="btn btn-default tool-tip">
									<i class="fa fa-refresh"></i>
								</button>
								<button type="button" title="Remove" class="btn btn-default tool-tip">
									<i class="fa fa-times-circle"></i>
								</button>
							</td>
						</tr>
						<!-- FIN DE PRODUCTO -->
					</tbody>
					<tfoot>
						<tr>
						  <td colspan="4" class="text-right">
							<strong>Total :</strong>
						  </td>
						  <td colspan="2" class="text-left">
							$300
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
											<input type="text" class="form-control" id="inputFname" placeholder="Primer Nombre">
										</div>
									</div>
									<div class="form-group">
										<label for="inputFname" class="col-sm-3 control-label">Apellido :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputFname" placeholder="Apellido">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPhone" class="col-sm-3 control-label">Telefono :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputPhone" placeholder="Celular">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-sm-3 control-label">Email :</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="inputEmail" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAddress1" class="col-sm-3 control-label">Calle :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputAddress1" placeholder="Nombre de calle">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAddress1" class="col-sm-3 control-label">Número :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputAddress1" placeholder="Altura">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAddress1" class="col-sm-3 control-label">Piso :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputAddress1" placeholder="Número de piso">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAddress1" class="col-sm-3 control-label">Depto :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputAddress1" placeholder="Departamento">
										</div>
									</div>
									<div class="form-group">
										<label for="inputCity" class="col-sm-3 control-label">Barrio :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputCity" placeholder="Barrio">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPostCode" class="col-sm-3 control-label">Código Postal :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputPostCode" placeholder="Código Postal">
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
