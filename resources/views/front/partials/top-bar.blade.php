<div class="top-bar hidden-xs">
    <!-- Nested Container Starts -->
    <div class="container">
        <!-- Nested Row Starts -->
        <div class="row">
            <!-- Search Starts -->
            <div class="col-md-3 col-md-offset-7 col-sm-6 col-xs-12">
                <div id="search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar">
                      <span class="input-group-btn">
                        <button class="btn" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                </div>
            </div>
            <!-- Search Ends -->
            <!-- Shopping Cart Starts -->
            @php $items = (session()->has('cart')) ? count(session('cart')) : 0;  @endphp
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div id="cart" class="btn-group btn-block">
                    <a href="/carrito" class="btn btn-block btn-lg text-uppercase">
                        <i class="fa fa-shopping-cart"></i>
                        <span id="cart-total">{{$items}} item(s)</span>
                    </a>
                </div>
            </div>
            <!-- Shopping Cart Ends -->
        </div>
        <!-- Nested Row Ends -->
    </div>
    <!-- Nested Container Ends -->
</div>
