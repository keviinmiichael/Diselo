@extends('front.app')

@section('title', 'Diselo')
@section('description', 'home')


@section('body')
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

	@if (Auth::guard('clients')->check())
		<!-- Main Container Starts -->

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
								@php
									$formOptions = ['url' => '/cart/buy', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'form'];
									$btn_txt = 'Finaliar Compra';
									$client = (\Auth::guard('clients')->check()) ? Auth::guard('clients')->user() : new \App\Client;
		                            $showPass = false;
								@endphp
								@include('front.clients._form', compact('formOptions', 'client', 'btn_txt', 'noPass'))
								<!-- Form Ends -->
							</div>
						</div>
						<!-- Shipment Information Block Ends -->
					</div>
					<!-- Shipping & Shipment Block Ends -->
				</div>
			</section>
			<!-- Shipping Section Ends -->
	@else
		<h3>Para completar su compra debes estar logueado !</h3>
		<h3>Si no tienes usuario registrarte <a href="/clients/create">Aqui</a> </h3>
	@endif

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
	      	<p class="default">Te llegará un email con la informacion para finalizar la compra!</p>
	      	<p class="error" style="display: none"></p>
	    </div>
	    <div class="modal-footer">
			<span class="close"><a href="javascript:void(0);" class="round-button">OK</a></span>
	    </div>
  	</div>
</div>

@endsection

@section('scripts')
	<script src="/js/front/cart.js"></script>
@endsection
