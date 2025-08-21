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
              <li class="breadcrumb-item active" aria-current="page">Kelola Produk</li>
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
                    <h3 class="card-title" style="flex-grow: 0.97;">List Data Produk</h3>
                    <!-- Tombol Tambah Data di kanan -->
                    <a href="/transaksi_supplier" class="btn btn-primary ms-auto" >Tambah Stok Produk</a>
                    <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addProduct">Tambah Produk</button>
                </div>
              
                <div class="card-body">
                  <!-- Modal Tambah Data -->
                 
                <!-- Modal Tambah Data -->
                <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('kelolaproduk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductLabel">Tambah Produk <span class="required" style="color: red;">*</span>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                            </div>
                            <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="required" style="color: red;">*</span>
                            </label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                            <label for="harga" class="form-label">Harga <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
                            </div>
                            <div class="mb-3">

                            <label for="stok" class="form-label">Stok (Stok Saat ini) <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                            </div>
                            <div class="mb-3">
                            <label for="bahan" class="form-label">Bahan <span class="required" style="color: red;">*</span>
                            </label>
                            <select class="form-select" id="bahan" name="bahan" required>
                                <option value="" disabled selected>Pilih Bahan <span class="required" style="color: red;">*</span>
                                </option>
                                <option>Cocoa Nibs</option>
                                <option>Cocoa Powder</option>
                                <option>Premiun Milk Chocolate</option>
                                <option>Dark Chocolate</option>
                                <option>Organic 100% Dark Chocolate</option>
                                <option>Healthy Chocolate</option>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal <span class="required" style="color: red;">*</span>
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                
                <!-- Modal Edit Data -->
                <div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                          <h5 class="modal-title" id="editProductLabel">Edit Produk</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" id="edit_id_produk" name="id_produk">
                          <div class="mb-3">
                            <label for="edit_nama_produk" class="form-label">Nama Produk <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk" required>
                          </div>
                          <div class="mb-3">
                            <label for="edit_deskripsi" class="form-label">Deskripsi <span class="required" style="color: red;">*</span>
                            </label>
                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="edit_harga" class="form-label">Harga <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="number" step="0.01" class="form-control" id="edit_harga" name="harga" required>
                          </div>
                          <div class="mb-3">
                            <label for="edit_stok" class="form-label">Stok <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="number" class="form-control" id="edit_stok" name="stok" required>
                          </div>
                          <div class="mb-3">
                            <label for="edit_bahan" class="form-label">Bahan <span class="required" style="color: red;">*</span>
                            </label>
                            <select class="form-select" id="edit_bahan" name="bahan" required>
                              <option value="" disabled>Pilih Bahan <span class="required" style="color: red;">*</span>
                              </option>
                              <option>Cocoa Nibs</option>
                              <option>Cocoa Powder</option>
                              <option>Premiun Milk Chocolate</option>
                              <option>Dark Chocolate</option>
                              <option>Organic 100% Dark Chocolate</option>
                              <option>Healthy Chocolate</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="edit_gambar" class="form-label">Gambar <span class="required" style="color: red;">*</span>
                            </label>
                            <input type="file" class="form-control" id="edit_gambar" name="gambar" accept="image/*">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <table class="example table table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Sales</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok Awal</th>
                        <th>Stok</th>
                        <th>Bahan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($produk as $key => $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{$item->nama_user}}</td>
                        <td>{{ $item->deskripsi ?? '-' }}</td>
                        <td>{{ number_format($item->harga, 2, ',', '.') }}</td>
                        <td>{{ empty($item->stok_awal) ? '0' : $item->stok_awal }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->bahan }}</td>
                        <td>
                          @if ($item->gambar)
                          <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Produk" width="50" height="50">
                          @else
                          <span>-</span>
                          @endif
                        </td>
                        <td>
                          <!-- Tombol Edit -->
                          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProduct" 
                                onclick='fillEditForm(@json($item))'>
                                Edit
                            </button>
                          
                          <!-- Tombol Hapus -->
                          <form action="{{ route('kelolaproduk.destroy', $item->id_produk) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Sales</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok Awal</th>
                        <th>Stok</th>
                        <th>Bahan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                  
                  <script>
                    function fillEditForm(data) {
                        // Isi form dengan data produk
                        document.getElementById('edit_id_produk').value = data.id_produk;
                        document.getElementById('edit_nama_produk').value = data.nama_produk;
                        document.getElementById('edit_deskripsi').value = data.deskripsi;
                        document.getElementById('edit_harga').value = data.harga;
                        document.getElementById('edit_stok').value = data.stok;
                        document.getElementById('edit_bahan').value = data.bahan;
                
                        // Atur action form edit
                        const editForm = document.getElementById('editForm');
                        editForm.action = `/kelolaproduk/${data.id_produk}`;
                    }
                </script>
                
                  
                  
  
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