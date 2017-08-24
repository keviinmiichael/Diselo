<header class="header-wrap inner">
    <div id="main-carousel">
        <img src="/images/front/banners/main-banner-img1.jpg" alt="<?php echo e(config('app.name')); ?>" class="img-responsive" />
    </div>


	<?php echo $__env->make('front.partials.top-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->make('front.partials.main-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="logo-wrap container">
		<h1><span><?php echo e(config('app.name')); ?></span></h1>
	</div>

</header>
