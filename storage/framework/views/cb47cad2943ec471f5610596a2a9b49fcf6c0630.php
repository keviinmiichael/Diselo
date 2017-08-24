<?php $__env->startSection('title', 'Diselo'); ?>
<?php $__env->startSection('description', '404'); ?>




<?php $__env->startSection('body'); ?>

	<!-- Main Container Starts -->
		<div class="main-container container">
		<!-- Main Heading Starts -->
			<h2 class="main-heading text-center">
				404 Page
			</h2>
		<!-- Main Heading Ends -->
		<!-- Content Starts -->
			<div class="content-box text-center">
				<h4 class="special-heading">oops !</h4>
				<h5>
					The page you were looking for could not be found.
				</h5>
				<br />
				<p>
					<a href="/" class="btn btn-black text-uppercase">Back to Home</a>
				</p>
			</div>
		<!-- Content Ends -->
		</div>
	<!-- Main Container Ends -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>