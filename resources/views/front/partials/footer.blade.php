<!-- Footer Section Starts -->
    <footer id="footer-area">
    <!-- Footer Links Starts -->
        <div class="footer-links">
        <!-- Container Starts -->
            <div class="container">
                <!-- Information Links Starts -->
                    <div class="col-md-2 col-sm-6">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                <!-- Information Links Ends -->

                <!-- Customer Service Links Starts -->
                    <div class="col-md-2 col-sm-6">
                        <h5>Service</h5>
                        <ul>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Site Map</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Specials</a></li>
                        </ul>
                    </div>
                <!-- Customer Service Links Ends -->

                <!-- Contact Us Starts -->
                    <div class="col-md-4 col-sm-12 last">
                        <h5>Contact Us</h5>
                        <ul>
                            <li>My Company</li>
                            <li>
                                1247 LB Nagar Road, Hyderabad, Telangana - 35
                            </li>
                            <li>
                                Email: <a href="#">info@demolink.com</a>
                            </li>
                        </ul>
                        <h4 class="lead">
                            Tel: <span>1(234) 567-9842</span>
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
                    &copy; 2017 Díselo
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


	var topPointer = $('.toptop').offset().top;
	var bottomPointer = topPointer + 15;
	$(window).scroll(function () {
		var scrollTop = $(window).scrollTop();
		if (scrollTop > bottomPointer) {
			$('.top-bar').css('top', '0');
		} else {
			$('.top-bar').css('top', '30px');
		}
	});
</script>
@yield('scripts')

</body>
</html>
