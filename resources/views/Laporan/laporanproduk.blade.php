@extends('layouts.Admin.app')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Data Produk</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
            </ol>
          </div>
        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <div class="col-md-12">
              <div class="card mb-12">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h3 class="card-title" style="flex-grow: 1;">List Data Produk</h3>
                  <form action="/laporanprodukpdf" method="GET">
                      <button type="submit" class="btn btn-primary">Cetak</button>
                  </form>
              </div>
              
                <div class="card-body">
                  <!-- Modal Tambah Data -->
                 

                <table class="example table table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Bahan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($produk as $key => $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->deskripsi ?? '-' }}</td>
                        <td>{{ number_format($item->harga, 2, ',', '.') }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->bahan }}</td>
                        
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Bahan</th>
                      </tr>
                    </tfoot>
                  </table>
                
              </div>
              </div>
          </div>
        
        </div>
      
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content-->
  </main>
@endsection