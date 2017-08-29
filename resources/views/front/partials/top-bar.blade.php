<div class="top-bar hidden-xs">
    <!-- Nested Container Starts -->
    <div class="container">
        <!-- Nested Row Starts -->
        <div class="row">
			<div class="col-md-2  col-sm-6 col-xs-12">
				<a href="/" class="logo-diselo">
					<img src="/images/front/logo-diselo.svg" alt="Diselo" >
				</a>
			</div>
			<!-- Navbar Cat collapse Starts -->
	        <div class="col-md-6 collapse navbar-collapse navbar-cat-collapse">
	            <ul class="navbar navbar-nav">

	                @foreach ($categories as $category)
	                    @if ($category->subcategories->count())
	                        <li class="dropdown">
	                            <a href="{{$category->slug}}" class="dropdown-toggle" data-hover="dropdown" data-delay="10">{{$category->name}}</a>
	                            <ul class="dropdown-menu" role="menu">
	                                @foreach ($category->subcategories as $subcategory)
	                                    <li><a tabindex="-1" href="/{{$category->slug}}/{{$subcategory->slug}}">{{$subcategory->name}}</a></li>
	                                @endforeach
	                            </ul>
	                        </li>
	                    @else
	                        <li><a href="/{{$category->slug}}">{{$category->name}}</a></li>
	                    @endif
	                @endforeach

	            </ul>
	        </div>
            <!-- Shopping Cart Starts -->
            @php $items = (session()->has('cart')) ? count(session('cart')) : 0;  @endphp
            <div class="col-md-2 col-sm-6 col-xs-12 cart">
                {{-- <div id="cart" class="btn-group btn-block"> --}}
                <div id="cart" class="">
                    <a href="/carrito" class="btn btn-block btn-lg text-uppercase">
                        <i class="fa fa-shopping-cart"></i>
                        <span id="cart-total">{{$items}} item(s)</span>
                    </a>
                </div>
            </div>
            <!-- Shopping Cart Ends -->
			<!-- Search Starts -->
			<div class="col-md-3 col-sm-6 col-xs-12 search">
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
        </div>
        <!-- Nested Row Ends -->
    </div>
    <!-- Nested Container Ends -->
</div>
