<!doctype html>
<html lang="es">
<head>
    @include('front.partials.head')
    @yield('head')
</head>
<body>
    @include('front.partials.header')
    
    <!-- Breadcrumb Starts -->
    <div class="breadcrumb-wrap">
        <div class="container">
        <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                @section('breadcrumb')
                    <li><a href="/">Home</a></li>
                @show
            </ol>
        <!-- Breadcrumb Ends -->        
        </div>
    </div>
    <!-- Breadcrumb Ends -->

    <!-- Main Container Starts -->
    <div class="main-container container inner">
        <div class="row">       
            <!-- Sidebar Starts -->
            <div class="col-md-3">
                 @include('front.asides.categories')
                 @include('front.asides.bestsellers')
            </div>
            <!-- Sidebar Ends -->
            <!-- Primary Content Starts -->
            <div class="col-md-9">
                <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, voluptatum.</h1>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ratione dolorem et, rem sequi laboriosam quae facilis veritatis repellendus? Corporis ipsam earum esse, consequuntur porro sapiente aliquid id veritatis deserunt.</div>
                <div>Impedit nam ad animi, molestiae dolores blanditiis! Tempora facere deleniti sapiente natus asperiores minus quas fugiat assumenda commodi dicta! Impedit cupiditate nobis culpa delectus libero beatae laboriosam quis cum. Sed.</div>
                <div>Suscipit beatae praesentium distinctio voluptate modi voluptates at consectetur voluptatem quos velit, dolores explicabo amet fugit provident, veritatis ullam officia consequatur laudantium magnam enim inventore hic animi impedit libero. Optio?</div>
                <div>Amet perspiciatis corporis, unde a rerum id aspernatur alias odit pariatur libero voluptatum, optio, tenetur totam molestiae hic facilis distinctio, voluptates consequuntur obcaecati adipisci possimus soluta voluptatem numquam culpa quod.</div>
                <div>Eveniet, velit, architecto! Vel minus laborum quidem deserunt amet atque soluta unde dolorum aliquam architecto cumque sint fugiat, minima possimus quisquam inventore aperiam obcaecati molestias aut ipsum doloremque voluptatem, optio.</div>
            </div>
            <!-- Primary Content Ends -->
        </div>
    </div>
<!-- Main Container Ends -->
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
                <!-- My Account Links Starts -->
                    <div class="col-md-2 col-sm-6">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My orders</a></li>
                            <li><a href="#">My merchandise returns</a></li>
                            <li><a href="#">My credit slips</a></li>
                            <li><a href="#">My addresses</a></li>
                            <li><a href="#">My personal info</a></li>
                        </ul>
                    </div>
                <!-- My Account Links Ends -->                  
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
                <!-- Follow Us Links Starts -->
                    <div class="col-md-2 col-sm-6">
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">RSS</a></li>
                            <li><a href="#">YouTube</a></li>
                        </ul>
                    </div>
                <!-- Follow Us Links Ends -->
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
                    &copy; 2016 Elite Fashion Shoppe Stores. Designed By <a href="http://sainathchillapuram.com">Sainath Chillapuram</a>
                </p>
            <!-- Ends -->
            <!-- Payment Gateway Links Starts -->
                <ul class="pull-right list-inline">
                    <li>
                        <img src="/images/front/payment-icon/cirrus.png" alt="PaymentGateway" />
                    </li>
                    <li>
                        <img src="/images/front/payment-icon/paypal.png" alt="PaymentGateway" />
                    </li>
                    <li>
                        <img src="/images/front/payment-icon/visa.png" alt="PaymentGateway" />
                    </li>
                    <li>
                        <img src="/images/front/payment-icon/mastercard.png" alt="PaymentGateway" />
                    </li>
                    <li>
                        <img src="/images/front/payment-icon/americanexpress.png" alt="PaymentGateway" />
                    </li>
                </ul>
            <!-- Payment Gateway Links Ends -->
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
<script src="/js/front/custom.js"></script>
</body>
</html>