<!doctype html>
<html lang="es">
<head>
    <?php echo $__env->make('front.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('head'); ?>
</head>
<body>
    <?php echo $__env->make('front.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('body'); ?>

	<?php echo $__env->make('front.partials.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Main Container Starts -->
    <div class="main-container container inner">
        <div class="row">
			<?php $__env->startSection('left-bar'); ?>
				<!-- Sidebar Starts -->
				<div class="col-md-3">
					<?php echo $__env->make('front.asides.categories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					
				</div>
				<!-- Sidebar Ends -->
			<?php echo $__env->yieldSection(); ?>
            <!-- Primary Content Starts -->
            <div class="col-md-<?php echo $__env->yieldContent("col", 9); ?>">
					<?php echo $__env->yieldContent("content"); ?>
            </div>
            <!-- Primary Content Ends -->
        </div>
    </div>
<!-- Main Container Ends -->
<?php echo $__env->yieldSection(); ?>


<?php echo $__env->make('front.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
