@extends('layouts.Admin.app')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Pesanan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kelola Pesanan</li>
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
                            <h3 class="card-title">List Data Pesanan</h3>
                        </div>

                        <div class="card-body">
                            <table class="example table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Harga Ongkir</th>
                                        <th>Harga Total</th>
                                        <th>Bukti</th>
                                        <th>Foto Barang Sampai</th>
                                        <th>User Data</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanans as $key => $pesanan)
                                        @foreach ($pesanan->detailPesanans as $detail)
                                            <tr>
                                                <td>{{ $key }}</td>
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
                                                <td>Rp{{ number_format($pesanan->harga_ongkir, 2) }}</td>
                                                <td>Rp{{ number_format($detail->jumlah * $detail->harga_satuan + $pesanan->harga_ongkir, 2) }}</td>
                                                
                                                <td>
                                                    @if ($pesanan->bukti)
                                                        <a href="{{ asset('storage/' . $pesanan->bukti) }}" download>
                                                            <img src="{{ asset('storage/' . $pesanan->bukti) }}"
                                                                alt="Bukti Diterima" width="50" height="50"
                                                                style="transition: transform 0.3s ease; cursor: pointer;"
                                                                onmouseover="this.style.transform='scale(2)'; this.style.transformOrigin='center';"
                                                                onmouseout="this.style.transform='scale(1)';">
                                                        </a>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>

                                              <td>
@if ($pesanan->bukti_foto)
    <a href="{{ asset('storage/' . $pesanan->bukti_foto) }}" download>
        <img src="{{ asset('storage/' . $pesanan->bukti_foto) }}" width="50" height="50"
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

                                                <td>{{ $pesanan->status }}</td>

                                                <td>
                                                    @if ($pesanan->status == 'Dikemas')
                                                        <form action="{{ route('kelolapesanan.proses', $pesanan->id_pesanan) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-success">Proses</button>
                                                        </form>
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalModal_{{ $pesanan->id_pesanan }}_{{ $detail->id }}">
                                                            Batal
                                                        </button>
                                                    @else
                                                        <!-- Tombol Buka Modal Upload -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#uploadModal_{{ $pesanan->id_pesanan }}">
    Selesai
</button>

<!-- Modal Upload Foto Barang Sampai -->
<div class="modal fade" id="uploadModal_{{ $pesanan->id_pesanan }}" tabindex="-1" aria-labelledby="uploadModalLabel_{{ $pesanan->id_pesanan }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('pesanan.upload_bukti', $pesanan->id_pesanan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload Foto Bukti Barang Sampai</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <input type="file" name="bukti_foto" class="form-control" accept="image/*" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Upload & Selesaikan</button>
          </div>
        </div>
    </form>
  </div>
</div>
                                                    @endif
                                                </td>
                                            </tr>

                                            <!-- Modal Alasan Batal -->
                                            <div class="modal fade" id="batalModal_{{ $pesanan->id_pesanan }}_{{ $detail->id }}" tabindex="-1"
                                                aria-labelledby="batalModalLabel_{{ $pesanan->id_pesanan }}_{{ $detail->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('kelolapesanan.batal', $pesanan->id_pesanan) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Masukkan Alasan Pembatalan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Alasan Pembatalan</label>
                                                                    <textarea name="alasan_batal" class="form-control" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-warning">Batal Pesanan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Harga Ongkir</th>
                                        <th>Harga Total</th>
                                        <th>Bukti</th>
                                        <th>Foto Barang Sampai</th>
                                        <th>User Data</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
