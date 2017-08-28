<div class="product-info-box">
	<h4 class="heading">Productos Relacionados</h4>
	<br>
	<div class="row">
		<?php $__currentLoopData = $product->getRelateds(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('front.products._box', ['col_md' => 3], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>