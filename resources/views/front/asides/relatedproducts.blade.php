<!-- Related Products Starts -->
	<div class="product-info-box">
		<h4 class="heading">Productos Relacionados</h4>
		<br>
	<!-- Products Row Starts -->
		<div class="row">
		<!-- Product Starts -->
		{{-- @foreach ($products as $product) --}}
			<div class="col-md-3 col-sm-6">
				<div class="product-col">
					<div class="image">
						<img src="images/product-images/10.jpg" alt="product" class="img-responsive" />
					</div>
					<div class="caption">
						<h4><a href="product.html">Digital Electro Goods</a></h4>
						<div class="description">
							We are so lucky living in such a wonderful time. Our almost unlimited ...
						</div>
						<div class="price">
							<span class="price-new">$199.50</span>
						</div>
						<div class="cart-button button-group">
							<button type="button" class="btn btn-cart">
								<i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
								Agregar al Carrito
							</button>
						</div>
					</div>
				</div>
			</div>
		{{-- @endforeach --}}
		<!-- Product Ends -->
		</div>
	<!-- Products Row Ends -->
	</div>
<!-- Related Products Ends -->
