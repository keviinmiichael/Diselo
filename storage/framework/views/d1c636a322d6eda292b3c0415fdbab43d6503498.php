<?php $__env->startSection('title', $product->name); ?>
<?php $__env->startSection('description', $product->description); ?>

<?php $__env->startSection('breadcrumb'); ?>
	##parent-placeholder-6e5ce570b4af9c70279294e1a958333ab1037c86##
	<li class="active"><?php echo e($product->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<?php echo $__env->make('front.partials.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- Main Container Starts -->
	<div class="main-container inner container">
	<!-- Product Info Starts -->
		<div class="row product-info full">
			<!-- Left Starts -->
			<div class="col-sm-4 images-block" >
				<a href="/content/products/big/<?php echo e($product->thumb); ?>">
					<img src="/content/products/250x320/<?php echo e($product->thumb); ?>" alt="<?php echo e($product->name); ?>" class="img-responsive thumbnail" />
				</a>
				<ul class="list-unstyled list-inline">
    				<?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<li style="width:77px">
    						<a href="/content/products/big/<?php echo e($image->src); ?>">
    							<img src="/content/products/thumb/<?php echo e($image->src); ?>" alt="<?php echo e($product->name); ?>" class="img-responsive thumbnail" />
    						</a>
    					</li>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<!-- Left Ends -->

			<!-- Right Starts -->
			<div class="col-sm-8 product-details">
				<div class="panel-smart">
					<h2><?php echo e($product->name); ?></h2>
					<hr />
					<!-- Price Starts -->
					<div class="price">
						<span class="price-head">Precio :</span>
						<span class="price-new">$<?php echo e($product->price); ?></span>
					</div>
					<!-- Price Ends -->
					<hr />
					<!-- Available Options Starts -->
					<div class="description">
						<h3>Descripción</h3>
						<?php echo e($product->description); ?>

					</div>
					<!-- Available Options Ends -->
					<!-- Available Options Starts -->
					<div class="options" style="margin-top: 10px">
						<div class="cart-button button-group">
							<a data-remodal-target="modal-<?php echo e($product->id); ?>" class="btn btn-cart">
								<i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
								Agregar al carrito
							</a>
						</div>
					</div>
					<!-- Available Options Ends -->
				</div>
			</div>
			<!-- Right Ends -->
		</div>
		<!-- Product Info Ends -->
		<?php echo $__env->make('front.asides.relatedproducts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<!-- Main Container Ends -->

	<?php echo $__env->make('front.products.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="/js/front/product.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>