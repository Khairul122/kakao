@extends('layouts.Admin.app')
@section('content')
<main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Data Pesanan</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pesanan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="app-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card mb-12">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title" style="flex-grow: 1;">List Data Pesanan</h3>
                    <form action="/laporanpesananpdf" method="GET" target="_blank">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </form>
                </div>
                <div class="card-body">
                <div style="overflow-x:auto;">
                <table class="example table table-bordered" style="width:100%; page-break-inside: auto;">
                    <thead style="display: table-header-group;">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Bukti</th>
                            <th>User Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanans as $key => $pesanan)
                            @foreach ($pesanan->detailPesanans as $detail)
                                <tr style="page-break-inside: avoid;">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pesanan->nama }}</td>
                                    <td>
                                        @if ($pesanan->user)
                                            {{ $pesanan->user->alamat }}
                                        @else
                                            <span>Alamat tidak ditemukan</span>
                                        @endif
                                    </td>
                                    <td>{{ $detail->produk->nama_produk }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td>Rp{{ number_format($detail->harga_satuan, 2) }}</td>
                                    <td>Rp{{ number_format($detail->jumlah * $detail->harga_satuan, 2) }}</td>
                                    <td>
                                        @if ($pesanan->bukti)
                                            <a href="{{ asset('storage/' . $pesanan->bukti) }}" download>
                                                <img src="{{ asset('storage/' . $pesanan->bukti) }}" alt="Bukti Pembayaran" width="50" height="50"
                                                     style="transition: transform 0.3s ease; cursor: pointer;"
                                                     onmouseover="this.style.transform='scale(2)'; this.style.transformOrigin='center';"
                                                     onmouseout="this.style.transform='scale(1)';">
                                            </a>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pesanan->user)
                                            {{ $pesanan->user->email }} <br>
                                            {{ $pesanan->user->no_hp }}
                                        @else
                                            <span>User tidak ditemukan</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot style="display: table-footer-group;">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Bukti</th>
                            <th>User Data</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
