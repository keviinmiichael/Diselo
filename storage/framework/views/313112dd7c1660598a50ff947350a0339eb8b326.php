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
    <div class="container">
        <!-- Nested Row Starts -->
        <div class="row">
			<div class="col-md-2  col-sm-3 col-xs-3">
				<a href="/" class="logo-diselo">
					<img src="/images/front/logo-diselo.svg" alt="Diselo" class="img-responsive" >
				</a>
			</div>
			<!-- Navbar Cat collapse Starts -->
	        <div class="col-md-6 collapse navbar-collapse navbar-cat-collapse" id="navbar">
	            <ul class="navbar navbar-nav my-nav" >

	                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <?php if($category->subcategories->count()): ?>
	                        <li class="dropdown">
	                            <a href="/<?php echo e($category->slug); ?>"  class="dropdown-toggle cambio"  data-hover="dropdown" data-delay="10"><?php echo e($category->name); ?></a>
	                            <ul class="dropdown-menu submenu" role="menu">
	                                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                    <li><a tabindex="-1" href="/<?php echo e($category->slug); ?>?subcategories[]=<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name); ?></a></li>
	                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            </ul>
	                        </li>
	                    <?php else: ?>
	                        <li><a href="/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></a></li>
	                    <?php endif; ?>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	            </ul>
	        </div>
            <!-- Shopping Cart Starts -->
            <?php  $items = (session()->has('cart')) ? count(session('cart')) : 0;   ?>
            <div class="col-md-2 col-sm-3 col-xs-3 cart">
                
                <div id="cart" class="">
                    <a href="/carrito" class="btn btn-block btn-lg text-uppercase">
                        <i class="fa fa-shopping-cart"></i>
                        <span id="cart-total"><?php echo e($items); ?> <em class="hidden-xs">item(s)</em></span>
                    </a>
                </div>
            </div>
            <!-- Shopping Cart Ends -->
			<!-- Search Starts -->
			<div class="col-md-3 col-sm-6 col-xs-6 search">
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
