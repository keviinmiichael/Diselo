<?php $__env->startSection('title', 'Listado de proudctos'); ?>
<?php $__env->startSection('description', 'Indumentaria - Remeras, vestidos, pantalones'); ?>

<?php $__env->startSection('breadcrumb'); ?>
	##parent-placeholder-6e5ce570b4af9c70279294e1a958333ab1037c86##
	<li class="active">Productos</li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
	##parent-placeholder-02083f4579e08a612425c0c1a17ee47add783b94##
	<?php $__env->startSection('content'); ?>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('front.products._box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php echo $__env->make('front.products._empty', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <?php echo e($products->links()); ?>

	<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="/js/front/product.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>