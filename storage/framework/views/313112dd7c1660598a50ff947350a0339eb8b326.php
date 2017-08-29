<div class="top-bar hidden-xs">
    <!-- Nested Container Starts -->
    <div class="container">
        <!-- Nested Row Starts -->
        <div class="row">
			<div class="col-md-3  col-sm-6 col-xs-12">
				<a href="/" class="logo-diselo">
					<img src="/images/front/logo-diselo.svg" alt="Diselo" >
				</a>
			</div>
            <!-- Search Starts -->
            <div class="col-md-3 col-md-offset-4  col-sm-6 col-xs-12">
				<form class="search" action="/productos/search" method="get">
                    <div id="search">
                        <div class="input-group">
                          <input type="text" name="search" class="form-control" placeholder="Buscar">
                          <span class="input-group-btn">
    							  <button class="btn" type="submit">
    								  <i class="fa fa-search"></i>
    							  </button>
                          </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Search Ends -->
            <!-- Shopping Cart Starts -->
            <?php  $items = (session()->has('cart')) ? count(session('cart')) : 0;   ?>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div id="cart" class="btn-group btn-block">
                    <a href="/carrito" class="btn btn-block btn-lg text-uppercase">
                        <i class="fa fa-shopping-cart"></i>
                        <span id="cart-total"><?php echo e($items); ?> item(s)</span>
                    </a>
                </div>
            </div>
            <!-- Shopping Cart Ends -->
        </div>
        <!-- Nested Row Ends -->
    </div>
    <!-- Nested Container Ends -->
</div>
