@extends('layouts.Subscribers.app')
@section('content')
<main>

    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="{{ asset ('assets/img/page-title/page-title-1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Detail {{$produk->nama_produk}}</h1>
                        <div class="page__title-breadcrumb">                                 
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$produk->nama_produk}}</li>
                            </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->


    <!-- shop details area start -->
    <section class="shop__area pb-65">
        <div class="shop__top grey-bg-6 pt-100 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="product__modal-box d-flex">
                            <div class="product__modal-nav mr-20">
                                <nav>
                                    <div class="nav nav-tabs" id="product-details" role="tablist">
                                        <a class="nav-item nav-link active" id="pro-one-tab" data-toggle="tab" href="#pro-one" role="tab" aria-controls="pro-one" aria-selected="true">
                                        <div class="product__nav-img w-img">
                                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="">
                                        </div>
                                        </a>                               
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content mb-20" id="product-detailsContent">
                                <div class="tab-pane fade show active" id="pro-one" role="tabpanel" aria-labelledby="pro-one-tab">
                                    <div class="product__modal-img product__thumb w-img">
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" height="70px" width="30px" alt="">
                                        {{-- <div class="product__sale ">
                                            <span class="new">new</span>
                                            <span class="percent">-16%</span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pro-two" role="tabpanel" aria-labelledby="pro-two-tab">
                                    <div class="product__modal-img product__thumb w-img">
                                        <img src="{{ asset ('assets/img/shop/product/details/details-big-2.jpg')}}" alt="">
                                        <div class="product__sale ">
                                            <span class="new">new</span>
                                            <span class="percent">-16%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pro-three" role="tabpanel" aria-labelledby="pro-three-tab">
                                    <div class="product__modal-img product__thumb w-img">
                                        <img src="{{ asset ('assets/img/shop/product/details/details-big-3.jpg')}}" alt="">
                                        <div class="product__sale ">
                                            <span class="new">new</span>
                                            <span class="percent">-16%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="product__modal-content product__modal-content-2">
                            <h4><a href="product-details.html">{{$produk->nama_produk}}</a></h4>
                            
                            <div class="product__price-2 mb-25">
                                <span>Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                {{-- <span class="old-price">$96.00</span> --}}
                            </div>
                            <div class="product__modal-des mb-30">
                                <p>{{$produk->deskripsi}}</p>
                            </div>
                            <div class="pro-quan-area d-sm-flex align-items-center">
                                <div class="product-quantity-title">
                                    <label>Quantity</label>
                                </div>
                                <div class="product-quantity mr-20 mb-20">
                                    <div class="cart-plus-minus">
                                        <input type="text" id="quantityInput" value="1" />
                                    </div>
                                </div>
                                @if($produk->stok == 0)
                                habis
                                @else
                                <div class="pro-cart-btn">
                                    <a href="#" id="addToCartBtn" 
                                       onclick="addToCart(
                                           {{ $produk->id_produk }}, 
                                           '{{ $produk->nama_produk }}', 
                                           {{ $produk->harga }}, 
                                           '{{ asset('storage/'.$produk->gambar) }}'
                                       )" 
                                       class="add-cart-btn mb-20">+ Add to Cart</a>
                                </div>
                                @endif
                            </div>
                            
                            
                            <script>
                                // Ambil nilai stok dari server-side
                                const stok = {{$produk->stok}};
                                const quantityInput = document.getElementById('quantityInput');
                                const cartPlusMinus = document.querySelector('.cart-plus-minus');
                                const addToCartBtn = document.getElementById('addToCartBtn');
                            
                                // Fungsi untuk memvalidasi nilai kuantitas
                                function validateQuantity() {
                                    let quantity = parseInt(quantityInput.value);
                            
                                    // Jika input bukan angka, set ke 1 (default)
                                    if (isNaN(quantity) || quantity < 1) {
                                        quantity = 1;
                                    }
                            
                                    // Jika kuantitas melebihi stok, set ke stok maksimum
                                    if (quantity > stok) {
                                        alert('Quantity tidak boleh melebihi stok yang tersedia!');
                                        quantity = stok;
                                    }
                            
                                    // Update nilai input
                                    quantityInput.value = quantity;
                                }
                            
                                // Tambahkan event listener pada elemen .cart-plus-minus
                                cartPlusMinus.addEventListener('click', function () {
                                    // Validasi ketika pengguna melakukan perubahan
                                    validateQuantity();
                                });
                            
                                // Validasi tambahan pada tombol Add to Cart
                                addToCartBtn.addEventListener('click', function (event) {
                                    const quantity = parseInt(quantityInput.value);
                            
                                    // Jika kuantitas melebihi stok, cegah aksi default
                                    if (quantity > stok) {
                                        event.preventDefault();
                                        alert('Quantity tidak boleh melebihi stok yang tersedia!');
                                    }
                                });
                            </script>
                            
                            <div class="product__tag mb-25">
                                <span>Stok:</span>
                                <span><a href="#">sisa {{$produk->stok}}</a></span>
                            </div>
                            {{-- <div class="product__share">
                                <span>Share :</span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-tab">
                            <div class="product__details-tab-nav text-center mb-45">
                                <nav>
                                    <div class="nav nav-tabs justify-content-start justify-content-sm-center" id="pro-details" role="tablist">
                                        {{-- <a class="nav-item nav-link active" id="des-tab" data-toggle="tab" href="#des" role="tab" aria-controls="des" aria-selected="true">Description</a>
                                        <a class="nav-item nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">Additional Information</a> --}}
                                        <a class="nav-item nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews ({{$reviews}})</a>
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content" id="pro-detailsContent">
                                {{-- <div class="tab-pane fade show active" id="des" role="tabpanel">
                                    <div class="product__details-des">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when anunknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                                        
                                        <div class="product__details-des-list mb-20">
                                            <ul>
                                                <li><span>Claritas est etiam processus dynamicus.</span></li>
                                                <li><span>Qui sequitur mutationem consuetudium lectorum.</span></li>
                                                <li><span>Claritas est etiam processus dynamicus.</span></li>
                                                <li><span>Qui sequitur mutationem consuetudium lectorum.</span></li>
                                                <li><span>Claritas est etiam processus dynamicus.</span></li>
                                                <li><span>Qui sequitur mutationem consuetudium lectorum.</span></li>
                                            </ul>
                                        </div>
                                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="add" role="tabpanel">
                                    <div class="product__details-add">
                                        <ul>
                                            <li><span>Weight</span></li>
                                            <li><span>.25 KG</span></li>
                                            <li><span>Dimention</span></li>
                                            <li><span>62 × 56 × 12 cm</span></li>
                                            <li><span>Size</span></li>
                                            <li><span>XL, XXL, LG, SM, MD</span></li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <div class="tab-pane fade show active" id="review" role="tabpanel">
                                    <div class="product__details-review">
                                        <div class="postbox__comments">
                                            <div class="postbox__comment-title mb-30">
                                                <h3>Reviews ({{$reviews}})</h3>
                                            </div>
                                            <div class="latest-comments mb-30">
                                                <ul>
                                                    @foreach($ulasans as $ulasan)
                                                   <li>
                                                    <div class="comments-box">
                                                        <div class="comments-avatar">
                                                            <img src="{{ asset ('assets/img/blog/comments/avater-3.png')}}" alt="">       
                                                        </div>
                                                        <div class="comments-text">
                                                            <div class="avatar-name">
                                                                <h5>{{$ulasan->user->nama}}</h5>
                                                                <span> - {{$ulasan->tanggal_ulasan}} </span>
                                                            </div>
                                                            <div class="user-rating">
                                                                <ul>
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        @if($i <= $ulasan->rating)
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        @else
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        @endif
                                                                    @endfor
                                                                </ul>
                                                            </div>
                                                            <p>{{$ulasan->komentar}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                   @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="post-comments-form mb-100">
                                            <div class="post-comments-title mb-30">
                                                <h3>Your Review</h3>
                                                <div class="post-rating">
                                                    <span>Your Rating :</span>
                                                    <ul>
                                                        <li><a href="#" class="star" data-value="1"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#" class="star" data-value="2"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#" class="star" data-value="3"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#" class="star" data-value="4"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#" class="star" data-value="5"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    
                                                </div>
                                            </div>
                                        
                                            <form id="contacts-form" class="conatct-post-form" action="{{ route('ulasan.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="contact-icon p-relative contacts-name">
                                                            <input type="text" value="{{ Auth::user()->nama ?? 'Anonymous'}}" placeholder="Nama">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="contact-icon p-relative contacts-name">
                                                            <input type="email" value="{{ Auth::user()->email  ?? '' }}" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="contact-icon p-relative contacts-message">
                                                            <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Comments"></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_produk" value="{{$produk->id_produk}}">
                                                    <input type="hidden" name="rating" id="rating" value="">
                                                    <div class="col-xl-12">
                                                        @if(auth()->check())
                                                            <button class="os-btn os-btn-black" type="submit">Beri Ulasan?</button>
                                                        @else
                                                            <button class="os-btn os-btn-black" type="button" disabled>Beri Ulasan?</button>
                                                            <p class="text-sm text-gray-500 mt-2">Silakan login untuk memberikan komentar.</p>
                                                        @endif
                                                    
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <!-- Script di bawah form -->
                                        <script>
                                            document.querySelectorAll('.star').forEach(function (star) {
                                                star.addEventListener('click', function (event) {
                                                    event.preventDefault(); // Mencegah default link
                                        
                                                    // Ambil nilai rating dari data-value
                                                    let rating = this.getAttribute('data-value');
                                        
                                                    // Masukkan nilai rating ke input hidden
                                                    document.getElementById('rating').value = rating;
                                        
                                                    // Reset semua bintang
                                                    document.querySelectorAll('.star').forEach(function (star) {
                                                        star.classList.remove('active');
                                                    });
                                        
                                                    // Tambahkan class active ke bintang yang dipilih dan sebelumnya
                                                    for (let i = 0; i < rating; i++) {
                                                        document.querySelectorAll('.star')[i].classList.add('active');
                                                    }
                                                });
                                            });
                                        
                                            // Tambahkan style untuk efek bintang aktif
                                            document.write(`
                                                <style>
                                                    .star.active i {
                                                        color: gold;
                                                    }
                                                </style>
                                            `);
                                        </script>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop details area end -->

    <!-- related products area start -->
    <section class="related__product pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__title-wrapper text-center mb-55">
                        <div class="section__title mb-10">
                            <h2>Produk Serupa</h2>
                        </div>
                        <div class="section__sub-title">
                            <p>Mau cari produk dengan bahan serupa? liat nih!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($produkSerupa as $same)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="product__wrapper mb-60">
                            <div class="product__thumb">
                                <a href="{{ route('detaildataProduk', $same->id_produk) }}" class="w-img">
                                    <img src="{{ asset('storage/' . $same->gambar) }}" alt="product-img" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">

                                </a>
                                <div class="product__action transition-3">
                                    <!-- Button trigger modal -->
                                    <a href="javascript:void(0);"   data-toggle="modal" data-target="#productModalId">
                                        <i class="fal fa-search"></i>
                                    </a>

                                </div>
                               
                            </div>
                            <div class="product__content p-relative">
                                <div class="product__content-inner">
                                    <h4><a href="product-details.html">{{$same->nama_produk}}</a></h4>
                                    <div class="product__price transition-3">
                                        <span>Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
    </section>
    <!-- related products area end -->

    <!-- shop modal start -->
    <!-- Modal -->
    <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered product-modal" role="document">
            <div class="modal-content">
                <div class="product__modal-wrapper p-relative">
                    <div class="product__modal-close p-absolute">
                        <button   data-dismiss="modal"><i class="fal fa-times"></i></button>
                    </div>
                    <div class="product__modal-inner">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-box">
                                    <div class="tab-content mb-20" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{ asset ('assets/img/shop/product/quick-view/quick-big-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{ asset ('assets/img/shop/product/quick-view/quick-big-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{ asset ('assets/img/shop/product/quick-view/quick-big-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <nav>
                                        <div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                            <div class="product__nav-img w-img">
                                                <img src="{{ asset ('assets/img/shop/product/quick-view/quick-sm-1.jpg')}}" alt="">
                                            </div>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                            <div class="product__nav-img w-img">
                                                <img src="{{ asset ('assets/img/shop/product/quick-view/quick-sm-2.jpg')}}" alt="">
                                            </div>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                            <div class="product__nav-img w-img">
                                                <img src="{{ asset ('assets/img/shop/product/quick-view/quick-sm-3.jpg')}}" alt="">
                                            </div>
                                            </a>
                                        </div>
                                        </nav>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-content">
                                    <h4><a href="product-details.html">Wooden container Bowl</a></h4>
                                    <div class="rating rating-shop mb-15">
                                        <ul>
                                            <li><span><i class="fas fa-star"></i></span></li>
                                            <li><span><i class="fas fa-star"></i></span></li>
                                            <li><span><i class="fas fa-star"></i></span></li>
                                            <li><span><i class="fas fa-star"></i></span></li>
                                            <li><span><i class="fal fa-star"></i></span></li>
                                        </ul>
                                        <span class="rating-no ml-10">
                                            3 rating(s)
                                        </span>
                                    </div>
                                    <div class="product__price-2 mb-25">
                                        <span>$96.00</span>
                                        <span class="old-price">$96.00</span>
                                    </div>
                                    <div class="product__modal-des mb-30">
                                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                                    </div>
                                    <div class="product__modal-form">
                                        <form action="#">
                                            <div class="product__modal-input size mb-20">
                                                <label>Size <i class="fas fa-star-of-life"></i></label>
                                                <select>
                                                    <option>- Please select -</option>
                                                    <option> S</option>
                                                    <option> M</option>
                                                    <option> L</option>
                                                    <option> XL</option>
                                                    <option> XXL</option>
                                                </select>
                                            </div>
                                            <div class="product__modal-input color mb-20">
                                                <label>Color <i class="fas fa-star-of-life"></i></label>
                                                <select>
                                                    <option>- Please select -</option>
                                                    <option> Black</option>
                                                    <option> Yellow</option>
                                                    <option> Blue</option>
                                                    <option> White</option>
                                                    <option> Ocean Blue</option>
                                                </select>
                                            </div>
                                            <div class="product__modal-required mb-5">
                                                <span >Repuired Fiields *</span>
                                            </div>
                                            <div class="pro-quan-area d-lg-flex align-items-center">
                                                <div class="product-quantity-title">
                                                    <label>Quantity</label>
                                                </div>
                                                <div class="product-quantity">
                                                    <div class="cart-plus-minus"><input type="text" value="1" /></div>
                                                </div>
                                                <div class="pro-cart-btn ml-20">
                                                    <a href="#" class="add-cart-btn mr-10">+ Add to Cart</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop modal end -->
</main>
@endsection