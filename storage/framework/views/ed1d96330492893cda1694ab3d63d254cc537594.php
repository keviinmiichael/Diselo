<?php $__env->startSection('title', 'Diselo'); ?>
<?php $__env->startSection('description', 'home'); ?>


<?php $__env->startSection('links'); ?>
	<link rel="stylesheet" type="text/css" href="/css/front/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/css/front/slick/slick-theme.css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<!-- Main Container Starts -->
		<div class="main-container container">
		<!-- Featured Products Starts -->
			<section class="products-list">
			<!-- Heading Starts -->
				<h2 class="product-head">Últimos Prodúctos</h2>
			<!-- Heading Ends -->

			<!-- Products Row Starts -->
			<div class="news">
				<?php echo $__env->renderEach('front.products._box', $nuevos, 'product'); ?>
			</div>
		<!-- Featured Products Ends -->
			<!-- Products Row Ends -->
			</section>
		<!-- Featured Products Ends -->
		<!-- Big Banner Starts -->
			<div class="full-banner">
				<img src="images/front/banners/big-banner.jpg" alt="Banner" class="img-responsive" />
			</div>
		<!-- Big Banner Ends -->
		</div>
	<!-- Main Container Ends -->
	<!-- Main Container Starts -->
		<div class="main-container container">
		<!-- Featured Products Starts -->
			<section class="products-list">
			<!-- Heading Starts -->
				<h2 class="product-head">Productos más vendidos</h2>
			<!-- Heading Ends -->

			<div class="sellers">
				<?php echo $__env->renderEach('front.products._box', $masvendidos, 'product'); ?>
			</div>
		<!-- Featured Products Ends -->
		<!-- 2Col Banners Starts -->
			<div class="col2-banners">
				<div class="row">
					<div class="col-sm-5 col-xs-12">
						<img src="images/front/banners/banner-img1.png" alt="Banner Image" class="img-responsive" />
					</div>
					<div class="col-xs-12 hidden-lg hidden-md hidden-sm">
						<br>
					</div>
					<div class="col-sm-7 col-xs-12">
						<img src="images/front/banners/banner-img2.png" alt="Banner Image" class="img-responsive" />
					</div>
				</div>
			</div>
		<!-- 2Col Banners Ends -->
		</div>
	<!-- Main Container Ends -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="/js/front/slick/slick.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.sellers, .news').slick({
			  dots: true,
			  infinite: true,
			  slidesToShow: 4,
			  slidesToScroll: 2,
			  responsive: [
			    {
			      breakpoint: 1045,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
					arrows: false,
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
					arrows: false,
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ]
			});
		});
	</script>
    <script src="/js/front/product.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>