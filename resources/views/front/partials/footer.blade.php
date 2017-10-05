<!-- Footer Section Starts -->
    <footer id="footer-area">
    <!-- Footer Links Starts -->
        <div class="footer-links">
        <!-- Container Starts -->
            <div class="container">
                <!-- Information Links Starts -->
                    <div class="col-md-2 col-sm-6">
                        <h5>Dirección</h5>
                        <ul>
                            <li>Dr. juan felipe Aranguren 3377</li>
                            <li>CABA</li>
                            <li>Buenos Aires, Argentina</li>
                        </ul>
                    </div>
                <!-- Information Links Ends -->

                <!-- Customer Service Links Starts -->
                    <div class="col-md-2 col-sm-6">
                        <h5>Horarios</h5>
                        <ul>
                            <li>Lunes a viernes de 7:30 a 17:30</li>
                            <li>Sabados de 8:30 a 13:00</li>
                        </ul>
                    </div>
                <!-- Customer Service Links Ends -->

                <!-- Contact Us Starts -->
                    <div class="col-md-4 col-sm-12 last">
                        <h5><a href="/contacto">Contacto</a></h5>
                        <ul>
                            <li>
                                Email: <a href="mailto:diseloindumentaria@gmail.com">diseloindumentaria@gmail.com</a>
                            </li>
                        </ul>
                        <h4 class="lead">
                            Tel: <span>(011) 4092-4375</span>
                        </h4>
                    </div>
                <!-- Contact Us Ends -->
            </div>
        <!-- Container Ends -->
        </div>
    <!-- Footer Links Ends -->
    <!-- Copyright Area Starts -->
        <div class="copyright">
        <!-- Container Starts -->
            <div class="container">
            <!-- Starts -->
                <p class="pull-left">
                    &copy; Copyright - 2017 Díselo - By <i>CoffeeCode</i>
                </p>
            <!-- Ends -->
            </div>
        <!-- Container Ends -->
        </div>
    <!-- Copyright Area Ends -->
    </footer>
<!-- Footer Section Ends -->
<!-- JavaScript Files -->
<script src="/js/front/jquery-1.11.1.min.js"></script>
<script src="/js/front/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/front/bootstrap.min.js"></script>
<script src="/js/front/bootstrap-hover-dropdown.min.js"></script>
<script src="/js/front/jquery.magnific-popup.min.js"></script>
<script src="/js/front/owl.carousel.min.js"></script>
<script src="/js/front/plugin/stepper/jquery.fs.stepper.js"></script>
<script src="/js/front/plugin/remodal/remodal.min.js"></script>
<script src="/js/front/plugin/lobibox/notifications.min.js"></script>
<script src="/js/front/custom.js"></script>
<script>
	if ($( window ).width() <= 900) {
		$( ".cambio" ).attr( "data-toggle", "dropdown" );
	}else {
		$( ".cambio" ).removeAttr( "data-toggle" )
	}

	if ($( window ).width() <= 900) {
		$( ".cambio" ).attr( "data-toggle", "dropdown" );
	}else {
		$( ".cambio" ).removeAttr( "data-toggle" )
	}


	var topPointer = $('.toptop').offset().top;
	var bottomPointer = topPointer + 15;
	$(window).scroll(function () {
		var scrollTop = $(window).scrollTop();
		if (scrollTop > bottomPointer) {
			$('.top-bar').css('top', '0');
			if ($( window ).width() <= 991) {
				$('.navbar-collapse').css('margin-top', '60px');
			}
		} else {
			$('.top-bar').css('top', '30px');
			if ($( window ).width() <= 991) {
				$('.navbar-collapse').css('margin-top', '90px');
			}
		}
	});
</script>
@yield('scripts')

</body>
</html>
