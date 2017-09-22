<div class="toptop">
	<ul>
		<li><a href="#">Registrarse</a></li>
		<li><a href="#">Iniciar Sesión</a></li>
		<li><a target="_blank" href="https://www.facebook.com/diseloindumentaria/"><img src="/images/front/fb-logo.svg" alt=""></a></li>
		<li><a target="_blank" href="https://www.instagram.com/diseloindumentaria/"><img src="/images/front/igram-logo.svg" alt=""></a></li>
	</ul>
</div>
<div class="top-bar">
	<button type="button" class="hamburguesa navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <i class="fa fa-bars" aria-hidden="true"></i>
     </button>
    <!-- Nested Container Starts -->
    <div class="container-fluid">
        <!-- Nested Row Starts -->
        <div class="row">
			<div class="col-lg-2 col-md-2  col-sm-2 col-xs-3">
				<a href="/" class="logo-diselo">
					<img src="/images/front/logo-diselo.svg" alt="Diselo" class="img-responsive" >
				</a>
			</div>
			<!-- Navbar Cat collapse Starts -->
			<!-- Search Starts -->
			<div class="col-lg-6 col-md-5 col-sm-8 col-xs-6 search">
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
	        <div class="col-lg-3 col-md-4 collapse navbar-collapse navbar-cat-collapse" id="navbar">
	            <ul class="navbar navbar-nav my-nav" >

					<li><a href="/">HOME</a></li>
					<li><a href="/productos">TIENDA</a></li>
					<li><a href="/contacto">CONTACTO</a></li>

	                {{-- @foreach ($categories as $category)
	                    @if ($category->subcategories->count())
	                        <li class="dropdown">
	                            <a href="/{{$category->slug}}"  class="dropdown-toggle cambio"  data-hover="dropdown" data-delay="10">{{$category->name}}</a>
	                            <ul class="dropdown-menu submenu" role="menu">
	                                @foreach ($category->subcategories as $subcategory)
	                                    <li><a tabindex="-1" href="/{{$category->slug}}?subcategories[]={{$subcategory->id}}">{{$subcategory->name}}</a></li>
	                                @endforeach
	                            </ul>
	                        </li>
	                    @else
	                        <li><a href="/{{$category->slug}}">{{$category->name}}</a></li>
	                    @endif
	                @endforeach --}}

	            </ul>
	        </div>
            <!-- Shopping Cart Starts -->
            @php $items = (session()->has('cart')) ? count(session('cart')) : 0;  @endphp
            <div class="col-md-1 col-sm-2 col-xs-3 cart">
                {{-- <div id="cart" class="btn-group btn-block"> --}}
                <div id="cart" class="">
                    <a href="/carrito" class="btn btn-block btn-lg text-uppercase">
                        <i class="fa fa-shopping-cart"></i>
                        <span id="cart-total">{{$items}} <em class="hidden-xs"></em></span>
                    </a>
                </div>
            </div>
            <!-- Shopping Cart Ends -->
        </div>
        <!-- Nested Row Ends -->
    </div>
    <!-- Nested Container Ends -->
</div>
