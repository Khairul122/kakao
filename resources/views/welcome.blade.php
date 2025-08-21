@extends('layouts.Subscribers.app')
@section('content')
<main>

    <div class="box-white grey-bg pt-50">
        <div class="container">
            <div class="box-white-inner">
                <div class="row">
                    <div class="col-xl-12">

                        <!-- slider area start -->
                        <section class="slider__area slider__area-4 p-relative">
                            <div class="slider-active">
                                <div class="single-slider single-slider-2 slider__height-4 d-flex align-items-center" data-background="assets/img/slider/poto1.png">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-9 col-sm-11 col-12">
                                                <div class="slider__content slider__content-4">
                                                    <h2 data-animation="fadeInUp" data-delay=".2s">Chocoa Milk</h2>
                                                    <p data-animation="fadeInUp" data-delay=".4s">PT.PAII Kota Pariaman. </p>
                                                    <a href="#" class="os-btn os-btn-2" data-animation="fadeInUp" data-delay=".6s">Discover now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slider single-slider-2 slider__height-4 d-flex align-items-center" data-background="assets/img/slider/2.jpg">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-9 col-sm-11 col-12">
                                                <div class="slider__content slider__content-4">
                                                    <h2 data-animation="fadeInUp" data-delay=".2s">Chocoa Bar</h2>
                                                    <p data-animation="fadeInUp" data-delay=".4s">PT.PAII Kota Pariaman </p>
                                                    <a href="#" class="os-btn os-btn-2" data-animation="fadeInUp" data-delay=".6s">Discover now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slider single-slider-2 slider__height-4 d-flex align-items-center" data-background="assets/img/slider/poto3.png">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-9 col-sm-11 col-12">
                                                <div class="slider__content slider__content-4">
                                                    <h2 data-animation="fadeInUp" data-delay=".2s">Chocoa Food</h2>
                                                    <p data-animation="fadeInUp" data-delay=".4s">PT.PAII Kota Pariaman </p>
                                                    <a href="#" class="os-btn os-btn-2" data-animation="fadeInUp" data-delay=".6s">Discover now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- slider area end -->

                        <!-- banner area start -->
                        <div class="banner__area pt-20">
                            <div class="container custom-container">
                              
                            </div>
                        </div>
                        <!-- banner area end -->

                        <!-- product area start -->
                        <section class="product__area pt-60 pb-100">
                            <div class="container custom-container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="section__title-wrapper text-center mb-55">
                                            <div class="section__title mb-10">
                                                <h2>Cokelat Terbaru</h2>
                                            </div>
                                            <div class="section__sub-title">
                                                <p>Miliki Cokelat yang berkualitas dan asli disini!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($produk as $item)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="banner__item mb-30 p-relative">
                                                <div class="banner__thumb fix">
                                                    <a href="{{ route('detaildataProduk', $item->id_produk) }}" class="w-img"><img src="{{ asset('storage/' . $item->gambar) }}" alt="banner"></a>
                                                </div>
                                                <div class="banner__content p-absolute transition-3">
                                                    <h6 style="
                                                        font-size: 14px; 
                                                        color: white; 
                                                        background: rgba(0, 0, 0, 0.3); 
                                                        backdrop-filter: blur(5px); 
                                                        border-radius: 20px; 
                                                        padding: 10px;
                                                        text-align: center;">
                                                        {{$item->nama_produk}}<br> - {{$item->bahan}}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="row">
                                    <div class="col-xl-12">
                                        <div class="product__load-btn text-center mt-25">
                                            <a href="#" class="os-btn os-btn-3">Load More</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </section>
                        <!-- product area end -->

                        <!-- banner area start -->
                        {{-- <div class="banner__area-2 pb-60">
                            <div class="container-fluid p-0">
                                <div class="row no-gutters">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="banner__item-2 banner-right p-relative mb-30 pr-15">
                                            <div class="banner__thumb fix">
                                                <a href="product-details.html" class="w-img"><img src="assets/img/shop/banner/banner-big-1.jpg" alt="banner"></a>
                                            </div>
                                            <div class="banner__content-2 banner__content-4 p-absolute transition-3">
                                                <span>Products Essentials</span>
                                                <h4><a href="product-details.html">Bottle With Wooden Cork</a></h4>
                                                <p>Mirum est notare quam littera gothica<br> parum claram, antep</p>
                                                <a href="product-details.html" class="os-btn os-btn-2">buy now / <span>$59.25</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class=" banner__item-2 banner-left p-relative mb-30 pl-15">
                                            <div class="banner__thumb fix">
                                                <a href="product-details.html" class="w-img"><img src="assets/img/shop/banner/banner-big-2.jpg" alt="banner"></a>
                                            </div>
                                            <div class="banner__content-2 banner__content-4 banner__content-4-right p-absolute transition-3">
                                                <span>Products Furniture</span>
                                                <h4><a href="product-details.html">Hauteville Plywood Chair</a></h4>
                                                <p>Mirum est notare quam littera gothica<br> parum claram, antep</p>
                                                <a href="product-details.html" class="os-btn os-btn-2">buy now / <span>$396.99</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- banner area end -->

                        <!-- product offer area start -->
                        {{-- <section class="product__offer pb-45">
                            <div class="container custom-container">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="product__offer-inner mb-30">
                                            <div class="product__title mb-60">
                                                <h4>Top Seller Products</h4>
                                            </div>
                                            <div class="product__offer-slider owl-carousel">
                                                <div class="product__offer-wrapper">
                                                    <div class="sidebar__widget-content">
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-1.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$98</span>
                                                                    <span class="price-old">$128</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-2.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$50</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-3.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$60</span>
                                                                    <span class="price-old">$70</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__offer-wrapper">
                                                    <div class="sidebar__widget-content">
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-4.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$200</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-5.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$80</span>
                                                                    <span class="price-old">$120</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-6.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$150</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="product__offer-inner mb-30">
                                            <div class="product__title mb-60">
                                                <h4>On Sale Products</h4>
                                            </div>
                                            <div class="product__offer-slider owl-carousel">
                                                <div class="product__offer-wrapper">
                                                    <div class="sidebar__widget-content">
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-4.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$30</span>
                                                                    <span class="price-old">$45</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-5.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$102</span>
                                                                    <span class="price-old">$122</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-6.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$60</span>
                                                                    <span class="price-old">$88</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__offer-wrapper">
                                                    <div class="sidebar__widget-content">
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-3.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$140</span>
                                                                    <span class="price-old">$150</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-2.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$40</span>
                                                                    <span class="price-old">$50</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-1.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="price">
                                                                    <span>$300</span>
                                                                    <span class="price-old">$350</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="product__offer-inner mb-30">
                                            <div class="product__title mb-60">
                                                <h4>Top Rated Products</h4>
                                            </div>
                                            <div class="product__offer-slider owl-carousel">
                                                <div class="product__offer-wrapper">
                                                    <div class="sidebar__widget-content">
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-7.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="rating rating-shop mb-5">
                                                                    <ul>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fal fa-star"></i></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="price">
                                                                    <span>$20</span>
                                                                    <span class="price-old">$40</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-8.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="rating rating-shop mb-5">
                                                                    <ul>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fal fa-star"></i></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="price">
                                                                    <span>$35</span>
                                                                    <span class="price-old">$40</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-9.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="rating rating-shop mb-5">
                                                                    <ul>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fal fa-star"></i></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="price">
                                                                    <span>$65</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__offer-wrapper">
                                                    <div class="sidebar__widget-content">
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-3.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="rating rating-shop mb-5">
                                                                    <ul>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fal fa-star"></i></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="price">
                                                                    <span>$98</span>
                                                                    <span class="price-old">$128</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-2.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="rating rating-shop mb-5">
                                                                    <ul>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fal fa-star"></i></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="price">
                                                                    <span>$98</span>
                                                                    <span class="price-old">$128</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="features__product-wrapper d-flex mb-20">
                                                            <div class="features__product-thumb mr-15">
                                                                <a href="product-details.html"><img src="assets/img/shop/product/sm/pro-sm-1.jpg" alt="pro-sm-1"></a>
                                                            </div>
                                                            <div class="features__product-content">
                                                                <h5><a href="product-details.html">Wooden container Bowl</a></h5>
                                                                <div class="rating rating-shop mb-5">
                                                                    <ul>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fas fa-star"></i></span></li>
                                                                        <li><span><i class="fal fa-star"></i></span></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="price">
                                                                    <span>$98</span>
                                                                    <span class="price-old">$128</span>
                                                                    <div class="add-cart p-absolute transition-3">
                                                                        <a href="#">+ Add to Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> --}}
                        <!-- product offer area end -->

                        <!-- blog area start -->
                        {{-- <section class="blog__area pb-70">
                            <div class="container custom-container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="section__title-wrapper text-center mb-55">
                                            <div class="section__title mb-10">
                                                <h2>Our Blog Posts</h2>
                                            </div>
                                            <div class="section__sub-title">
                                                <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="blog__slider owl-carousel">
                                            <div class="blog__item mb-30">
                                                <div class="blog__thumb fix">
                                                    <a href="blog-details.html" class="w-img"><img src="assets/img/blog/blog-1.jpg" alt="blog"></a>
                                                </div>
                                                <div class="blog__content">
                                                    <h4><a href="blog-details.html">Anteposuerit litterarum formas.</a></h4>
                                                    <div class="blog__meta">
                                                        <span>By <a href="#">Shahnewaz Sakil</a></span>
                                                        <span>/ September 14, 2017</span>
                                                    </div>
                                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                                                    <a href="blog-details.html" class="os-btn">read more</a>
                                                </div>
                                            </div>
                                            <div class="blog__item mb-30">
                                                <div class="blog__thumb fix">
                                                    <a href="blog-details.html" class="w-img"><img src="assets/img/blog/blog-2.jpg" alt="blog"></a>
                                                </div>
                                                <div class="blog__content">
                                                    <h4><a href="blog-details.html">Hanging fruit to identify</a></h4>
                                                    <div class="blog__meta">
                                                        <span>By <a href="#">Shahnewaz Sakil</a></span>
                                                        <span>/ September 14, 2017</span>
                                                    </div>
                                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                                                    <a href="blog-details.html" class="os-btn">read more</a>
                                                </div>
                                            </div>
                                            <div class="blog__item mb-30">
                                                <div class="blog__thumb fix">
                                                    <a href="blog-details.html" class="w-img"><img src="assets/img/blog/blog-3.jpg" alt="blog"></a>
                                                </div>
                                                <div class="blog__content">
                                                    <h4><a href="blog-details.html">The information highway will</a></h4>
                                                    <div class="blog__meta">
                                                        <span>By <a href="#">Shahnewaz Sakil</a></span>
                                                        <span>/ September 14, 2017</span>
                                                    </div>
                                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                                                    <a href="blog-details.html" class="os-btn">read more</a>
                                                </div>
                                            </div>
                                            <div class="blog__item mb-30">
                                                <div class="blog__thumb fix">
                                                    <a href="blog-details.html" class="w-img"><img src="assets/img/blog/blog-2.jpg" alt="blog"></a>
                                                </div>
                                                <div class="blog__content">
                                                    <h4><a href="blog-details.html">Additional clickthroughs from</a></h4>
                                                    <div class="blog__meta">
                                                        <span>By <a href="#">Shahnewaz Sakil</a></span>
                                                        <span>/ September 14, 2017</span>
                                                    </div>
                                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                                                    <a href="blog-details.html" class="os-btn">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> --}}
                        <!-- blog area end -->

                        <!-- subscribe area start -->
                        {{-- <section class="subscribe__area pb-100">
                                <div class="container custom-container">
                                    <div class="subscribe__inner pt-95">
                                        <div class="row">
                                            <div class="col-xl-8 offset-xl-2">
                                                <div class="subscribe__content text-center">
                                                    <h2>Get Discount Info</h2>
                                                    <p>Subscribe to the Outstock mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                                                    <div class="subscribe__form">
                                                        <form action="#">
                                                            <input type="email" placeholder="Subscribe to our newsletter...">
                                                            <button class="os-btn os-btn-2 os-btn-3">subscribe</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section> --}}
                        <!-- subscribe area end -->

                    </div>
                </div>
            </div>  
        </div>
    </div>
 
</main>
@endsection