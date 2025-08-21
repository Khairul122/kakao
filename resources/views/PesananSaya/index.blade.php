@extends('layouts.Subscribers.app')
@section('content')
<main>


    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/page-title/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Pesanan Saya</h1>
                        <div class="page__title-breadcrumb">                                 
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Pesanan Saya</li>
                            </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- Cart Area Strat-->
    <section class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Gambar</th>
                                        <th class="cart-product-name">Produk</th>
                                        <th class="product-price">Harga Satuan</th>
                                        <th class="product-quantity">Kuantitas</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Status</th>
                                        <th class="product-action">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi semua pesanan --}}
                                    @forelse ($pesanans as $pesanan)
                                        {{-- Iterasi setiap detail dari pesanan --}}
                                        @foreach ($pesanan->detailPesanans as $detail)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="product-details.html">
                                                        {{-- Jika ada gambar produk, tampilkan; jika tidak, gunakan gambar default --}}
                                                        <img src="{{ asset('storage/' . $detail->produk->gambar) }}" 
                                                            alt="{{ $detail->produk->nama_produk ?? 'Gambar tidak tersedia' }}">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name">
                                                    <a href="product-details.html">
                                                        {{ $detail->produk->nama_produk ?? 'Produk Tidak Ditemukan' }}
                                                    </a>
                                                </td>
                                                <td class="product-price">
                                                    {{-- Format harga satuan produk --}}
                                                    <span class="amount">Rp{{ number_format($detail->harga_satuan, 2) }}</span>
                                                </td>
                                                <td class="product-quantity">
                                                    {{-- Menampilkan jumlah produk --}}
                                                    
                                                        {{ $detail->jumlah }}
                                                </td>
                                                <td class="product-subtotal">
                                                    {{-- Menghitung subtotal: jumlah * harga satuan --}}
                                                    <span class="amount">Rp{{ number_format($detail->jumlah * $detail->harga_satuan, 2) }}</span>
                                                </td>
                                                <td class="product-remove">
                                                    {{-- Menampilkan status pesanan --}}
                                                    <span>{{ $pesanan->status }}</span>
                                                </td>
                                                <td class="product-action">
                                                    @if ($pesanan->status === 'proses')
                                                    <button 
                                                        class="os-btn os-btn-black selesai-btn" 
                                                        data-id="{{ $pesanan->id_pesanan }}" 
                                                        onclick="konfirmasiSelesai(event, {{ $pesanan->id_pesanan }})">
                                                        Selesai
                                                    </button>
                                                @elseif ($pesanan->status === 'selesai')
                                                    <span class="text-success">Selesai</span>
                                                @else
                                                    <span class="text-muted">Tidak Tersedia</span>
                                                @endif
                                                
                                                </td>
                                                <script>
                                                    function konfirmasiSelesai(event, idPesanan) {
                                                        event.preventDefault();
                                                
                                                        // Konfirmasi dari pengguna
                                                        if (confirm('Apakah Anda yakin ingin mengonfirmasi pesanan ini selesai?')) {
                                                            fetch(`/myorder/${idPesanan}/selesai`, {
                                                                method: 'PATCH',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF Laravel
                                                                    'Content-Type': 'application/json'
                                                                }
                                                            })
                                                            .then(response => {
                                                                if (response.ok) {
                                                                    alert('Pesanan berhasil dikonfirmasi selesai.');
                                                                    location.reload(); // Reload halaman untuk melihat perubahan
                                                                }
                                                            })
                                                            .catch(error => {
                                                                console.error('Error:', error);
                                                                alert('Terjadi kesalahan saat mengonfirmasi pesanan.');
                                                            });
                                                        }
                                                    }
                                                </script>
                                                
                                            </tr>
                                        @endforeach
                                    @empty
                                        {{-- Pesan jika tidak ada pesanan ditemukan --}}
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada pesanan ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Total Belanjaan Saya</h2>
                                    <ul class="mb-20">
                                        <li>Subtotal 
                                            {{-- Ganti $250.00 dengan nilai total dari backend --}}
                                            <span>Rp{{ number_format($totalBelanja, 2) }}</span>
                                        </li>
                                        <li>Total 
                                            {{-- Sama seperti subtotal jika tidak ada tambahan biaya --}}
                                            <span>Rp{{ number_format($totalBelanja, 2) }}</span>
                                        </li>
                                        <li>
                                            <a href="/myorder_print">Cetak Faktur</a>                                  
                                            
                                        </li>
                                        
                                    </ul>
                                    {{-- Tombol checkout (dapat diaktifkan kembali jika ada fungsi checkout) --}}
                                    {{-- <a class="os-btn" href="checkout.html">Proceed to checkout</a> --}}
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Area End-->
</main>
@endsection