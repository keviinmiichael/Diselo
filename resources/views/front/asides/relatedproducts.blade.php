<div class="product-info-box">
	<h4 class="heading">Productos Relacionados</h4>
	<br>
	<div class="row">
		@foreach ($product->getRelateds() as $product)
			@include('front.products._box', ['col_md' => 3])
		@endforeach
	</div>
</div>