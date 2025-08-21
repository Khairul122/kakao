<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PT.PAII | Minang Kakao </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontAwesome5Pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<header>
    <div id="header-sticky" class="header__area grey-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <div class="logo">
                        <p><h2>OutStock</h2></p>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8">
                    <div class="header__right p-relative d-flex justify-content-between align-items-center">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a href="/">Home</a></li>

                                    <li class="mega-menu has-dropdown"><a href="shop.html">Data Produk</a>
                                        <ul class="submenu transition-3" data-background="{{ asset('assets/img/bg/mega-menu-bg.jpg') }}">
                                            <li class="has-dropdown">
                                                <a href="shop.html">Bahan Produk</a>
                                                <ul>
                                                    <li><a href="{{ url('/') }}?Cocoa Nibs">Cocoa Nibs</a></li>
                                                    <li><a href="{{ url('/') }}?Cocoa Powder">Cocoa Powder</a></li>
                                                    <li><a href="{{ url('/') }}?Premium Milk Chocolate">Premium Milk Chocolate</a></li>
                                                    <li><a href="{{ url('/') }}?Dark Chocolate">Dark Chocolate</a></li>
                                                    <li><a href="{{ url('/') }}?Organic 100% Chocolate">Organic 100% Chocolate</a></li>
                                                    <li><a href="{{ url('/') }}?Healthy Chocolate">Healthy Chocolate</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    @auth
                                    <li><a href="/myorder">Pesanan Saya</a></li>
                                    @endauth
                                   
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu-btn d-lg-none">
                            <a href="javascript:void(0);" class="mobile-menu-toggle"><i class="fas fa-bars"></i></a>
                        </div>
                        <div class="header__action">
                                <ul>
                                 
                                   @include('Cart.index')
                                    <li> <a href="javascript:void(0);"><i class="far fa-bars"></i></a>
                                        <ul class="extra-info">
                                            <li>
                                                <div class="my-account">
                                                    <div class="extra-title">
                                                        <h5>{{ Auth::check() ? Auth::user()->nama : '(anonymous)' }}</h5>
                                                    </div>
                                                    <ul>
                                                        @if(Route::has('login'))
                                                       
                                                            @auth
                                                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'penjual')
                                                            <a href="{{ url('/home') }}">Home</a>
                                                            @endif
                                                             
                                                            @else
                                                                <a href="{{ route('login') }}">Log in</a> | 
                                        
                                                                @if (Route::has('register'))
                                                                    <a href="{{ route('register') }}" >Register</a>
                                                                @endif
                                                            @endauth
                                                        @endif
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="lang">
                                                    @auth
                                                    <div class="extra-title">
                                                        <h5>Sesi Akun</h5>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </li>                                                        
                                                       
                                                    </ul>
                                                    @endauth
                                                    
                                                </div>
                                            </li>
                                           
                                        </ul>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>