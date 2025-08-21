@extends('layouts.Subscribers.app')
@section('content')
<main>
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="{{ asset ('assets/img/page-title/page-title-1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Checkout</h1>
                        <div class="page__title-breadcrumb">                                 
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Checkout</li>
                            </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- coupon-area end -->
    <!-- checkout-area start -->
    <section class="checkout-area pb-70">
        <div class="container">
         
                <div class="row">
                    <!-- Form Detail Pembayaran -->
                    <div class="col-lg-12">
                        <div class="checkbox-form">
                          
                            <div class="row">
                                <!-- Input form untuk detail pengguna -->
                                <!-- ... -->
                            </div>
                        </div>
                    </div>
    
                    <!-- Detail Pesanan -->
                   
                </div>
        </div>
    </section>
    <section class="checkout-area pb-70">
        <div class="container">
            <form id="checkoutForm" action="{{ route('checkout.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <!-- Form Detail Pembayaran -->
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Detail Pengguna</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Nama Lengkap <span class="required">*</span></label>
                                        <input name="nama" value="{{ Auth::user()->nama }}" type="text"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input name="email" value="{{ Auth::user()->email }}" type="email"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Daerah <span class="required">*</span></label>
                                            <select class="form-control" required id="harga_ongkir" name="harga_ongkir">
                                                <option value="0">--Pilih Daerah--</option>
                                                <option value="12000">Padang</option>
                                                <option value="10000">Pariaman</option>
                                                <option value="20000">Bukittinggi</option>
                                                <option value="25000">Payakumbuah</option>
                                                <option value="15000">Batusangkar</option>
                                                <option value="13000">Padang Panjang</option>
                                                <option value="23000">Dhamasraya</option>
                                                <option value="24000">Sawah Lunto</option>
                                                <option value="18000">Solok</option>
                                                <option value="26000">Sijunjung</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>No. HP <span class="required">*</span></label>
                                        <input name="no_hp" value="{{ Auth::user()->no_hp }}" type="text"  />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Alamat <span class="required">*</span></label>
                                        <textarea name="alamat" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
    
                    <!-- Detail Pesanan -->
                    <div class="col-lg-6">
                        <div class="your-order mb-30">
                            <h3>Pesanan Saya</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produk</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @foreach ($cart as $item)
                                            @php 
                                                $subtotal = $item['harga_satuan'] * $item['jumlah'];
                                                $total += $subtotal;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <input type="hidden" name="cart[{{ $loop->index }}][id_produk]" value="{{ $item['id_produk'] }}">
                                                    <input type="hidden" name="cart[{{ $loop->index }}][jumlah]" value="{{ $item['jumlah'] }}">
                                                    <input type="hidden" name="cart[{{ $loop->index }}][harga_satuan]" value="{{ $item['harga_satuan'] }}">
                                                    {{ $item['nama_produk'] }} <strong class="product-quantity"> × {{ $item['jumlah'] }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                                    <input type="hidden" id="sub_total" value="<?php echo $subtotal; ?>">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">Rp {{ number_format($total, 0, ',', '.') }}</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Harga Ongkir</th>
                                            <td><span class="ongkir" id="ongkir">Rp0</span></td>
                                        </tr>
                                        {{-- <tr class="shipping">
                                            <th>Ongkos Kirim</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <input type="radio" name="shipping" value="7000"  />
                                                        <label>Flat Rate: <span class="amount">Rp 7,000</span></label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="shipping" value="0"  />
                                                        <label>Free Shipping</label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr> --}}
                                        <tr class="shipping">
                                            <th>Metode Pembayaran</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <input type="radio" name="paymentMethod" id="paymentCOD" required value="COD" />
                                                        <label for="paymentCOD">Cash On Delivery (COD)</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="paymentMethod" id="paymentTransfer" required value="Transfer" />
                                                        <label for="paymentTransfer">Transfer</label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total Pesanan</th>
                                            <td><strong><span class="amount" id="total_bayar">Rp {{ number_format($total , 0, ',', '.') }}</span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
    
                            <!-- Metode Pembayaran -->
                            <div class="payment-method">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" 
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Transfer Bank
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Silakan transfer pembayaran Anda langsung ke rekening kami (Bank Bri = 123456789009876543456). 
                                                Gunakan ID Pesanan Anda sebagai referensi pembayaran. Lalu upload bukti pembayaran di sini.
                                        
                                                <div class="checkout-form-list">
                                                    <label>Upload Bukti Pembayaran <span class="required">*</span></label>
                                                    <input id="buktiPembayaran" name="bukti_pembayaran" type="file" required />
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" 
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    COD
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Bayar langsung di tempat (Cash On Delivery) saat pesanan Anda diterima.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     <div class="order-button-payment mt-20">
                                    <button type="submit" class="os-btn os-btn-black">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
            <script>
               document.addEventListener("DOMContentLoaded", function () {
                const paymentCOD = document.getElementById('paymentCOD');
                const paymentTransfer = document.getElementById('paymentTransfer');
                const collapseOne = document.getElementById('collapseOne');
                const collapseTwo = document.getElementById('collapseTwo');
                const buktiPembayaran = document.getElementById('buktiPembayaran');
                const harga_ongkir = document.getElementById('harga_ongkir');

                // when client clicked on select element 
                harga_ongkir.addEventListener('click', () => {
                // if default value is changed
                harga_ongkir.addEventListener('change', () => {
                // if value switched by client
                if(harga_ongkir.value!='0'){
                const sub_total = document.getElementById('sub_total');
                const total_bayar = parseInt(harga_ongkir.value) + parseInt(sub_total.value);
                    switch (harga_ongkir.value) {
                    case "10000":
                    //do somthing with  , "add" value
                        document.getElementById('ongkir').innerHTML = 'Rp 10.000';
                        break;  // then take break
                    case "15000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 15.000';
                        break;
                    case "12000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 12.000';
                        break;
                    case "20000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 20.000';
                        break;
                    case "25000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 25.000';
                        break;
                    case "13000":
                        //do somthing with  , "add" value
                        document.getElementById('ongkir').innerHTML = 'Rp 13.000';
                        break;  // then take break
                    case "23000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 23.000';
                        break;
                    case "24000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 24.000';
                        break;
                    case "18000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 18.000';
                        break;
                    case "26000":
                    //do somthing with  , "remove" value
                        document.getElementById('ongkir').innerHTML = 'Rp 26.000';
                        break;
                }
                document.getElementById('total_bayar').innerHTML = "Rp" + total_bayar;
                       }
                });
                });

                paymentCOD.addEventListener('change', function () {
                    if (paymentCOD.checked) {
                        collapseOne.classList.remove('show');
                        collapseTwo.classList.add('show');  
                        buktiPembayaran.removeAttribute('required');
                    }
                });

                paymentTransfer.addEventListener('change', function () {
                    if (paymentTransfer.checked) {
                        collapseTwo.classList.remove('show');
                        collapseOne.classList.add('show');
                        buktiPembayaran.setAttribute('required', true);
                    }
                });
            });
            /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
            </script>
            
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    // Menambahkan event listener untuk form submit
                    document.querySelector('#checkoutForm').addEventListener('submit', function (event) {
                        // Menunggu form selesai disubmit, baru menghapus localStorage
                        setTimeout(() => {
                            localStorage.removeItem('cart'); // Menghapus keranjang dari localStorage
                            console.log('Keranjang sudah dikosongkan di localStorage');
                        }, 500); // Penundaan 500ms untuk memastikan form telah terkirim
                    });
                });

               
            </script>
        </div>
    </section>
    
    
    <!-- checkout-area end -->

        
    </script>

@endsection