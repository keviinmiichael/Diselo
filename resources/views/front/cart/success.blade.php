@extends('front.app')

@section('title', 'Diselo')
@section('description', 'home')


@section('body')
<!-- Main Container Starts -->
<div class="main-container container">

	<h2 class="main-heading text-center">Pedido exitoso</h2>

	{{-- <div>
		<p class="text-center">Para abonar su pedido puede hacerlo orem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ut</p>
		<p class="text-center">Puede ponser en contacto con nosotros Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, sint.</p>
	</div> --}}

	<!-- Shopping Cart Table Starts -->
	<div class="table-responsive shopping-cart-table">
		<table class="table table-bordered">
			<thead>
				<tr>
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
				</tr>
			</thead>
			<!-- INICIO DE PRODUCTO -->
			<tbody>
				@php $total = 0; @endphp
				@foreach ($products as $product)
					@foreach (session('buy.'.$product->id) as $size => $items)
						 @foreach ($items as $item)
							<tr>
								<td class="text-center">
									{{ $product->name }}
								</td>
								<td class="text-center">
									{{ \App\Size::find($size)->value }}
								</td>
								<td class="text-center">
									{{ \App\Color::find($item[0])->value }}
								</td>
								<td class="text-center">
									{{ $item[1] }}
								</td>
								<td class="text-center">
									$ {{ $product->price }}
								</td>
								<td class="text-center total">
									$ {{ $item[1] * $product->price }}
								</td>
								@php $total += $item[1] * $product->price; @endphp
							</tr>
						@endforeach
					@endforeach
				@endforeach
			</tbody>
			<tfoot>
				<tr>
				  <td colspan="5" class="text-right">
					<strong>Total :</strong>
				  </td>
				  <td class="text-center">
					<span class="total-final">$ {{ $total }}</span>
				  </td>
				</tr>
			</tfoot>
		</table>
	</div>
	<!-- Shopping Cart Table Ends -->

</div>
<!-- Main Container Ends -->

@endsection
