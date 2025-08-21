<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from html.storebuild.shop/outstock-prv/outstock/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Jan 2025 12:09:28 GMT -->
    @include('layouts.Subscribers.header')
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->  

        <!-- prealoder area start -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                <div class="object" id="first_object"></div>
                <div class="object" id="second_object"></div>
                <div class="object" id="third_object"></div>
                </div>
            </div>      
        </div>
        <!-- prealoder area end -->

        <!-- header area start -->
      
        <!-- header area end -->
        
        <!-- scroll up area start -->
        <div class="scroll-up" id="scroll" style="display: none;">
            <a href="javascript:void(0);"><i class="fas fa-level-up-alt"></i></a>
        </div>
        <!-- scroll up area end -->

        <!-- search area start -->
        <section class="header__search white-bg transition-3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="header__search-inner text-center">
                            <form action="#">
                                <div class="header__search-btn">
                                    <a href="javascript:void(0);" class="header__search-btn-close"><i class="fal fa-times"></i></a>
                                </div>
                                <div class="header__search-header">
                                    <h3>Search</h3>
                                </div>
                                <div class="header__search-categories">
                                    <ul class="search-category">
                                        <li><a href="shop.html">All Categories</a></li>
                                        <li><a href="shop.html">Accessories</a></li>
                                        <li><a href="shop.html">Chair</a></li>
                                        <li><a href="shop.html">Tablet</a></li>
                                        <li><a href="shop.html">Men</a></li>
                                        <li><a href="shop.html">Women</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="header__search-input p-relative">
                                    <input type="text" placeholder="Search for products... ">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="body-overlay transition-3"></div>
        <!-- search area end -->

        <!-- extra info area start -->
        @include('layouts.Subscribers.mobile')
        <div class="body-overlay transition-3"></div>
        <!-- extra info area end -->

       @yield('content')

        <!-- footer area start -->
        @include('layouts.Subscribers.footer')
        <!-- footer area end -->
		<!-- JS here -->
        <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui-slider-range.js') }}"></script>
        <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/cart.js') }}"></script>
    </body>

<!-- Mirrored from html.storebuild.shop/outstock-prv/outstock/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Jan 2025 12:09:29 GMT -->
</html>
