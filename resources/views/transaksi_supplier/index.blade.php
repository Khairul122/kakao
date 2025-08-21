@extends('layouts.Admin.app')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Data Transaksi Supplier</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item"><a href="/kelolaproduk">Kelola Produk</a></li>
              <li class="breadcrumb-item active" aria-current="page">Transaksi Supplier</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card mb-12">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">List Data Transaksi Supplier</h3>
                    <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addModalStok">Tambah Data</button>
                </div>
              
                <div class="card-body">
                  <!-- Modal Tambah Data -->
                  <div class="modal fade" id="addModalStok" tabindex="-1" aria-labelledby="addModalStokLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <form id="addForm" method="POST" action="{{ route('transaksi_supplier.store') }}">
                                  @csrf
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="addModalStokLabel">Tambah Transaksi Supplier</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="mb-3">
                                          <label for="add_id_supplier" class="form-label">Supplier <span class="required" style="color: red;">*</span></label>
                                          <select class="form-select" id="add_id_supplier" name="id_supplier" required>
                                              @foreach ($suppliers as $supplier)
                                                  <option value="{{ $supplier->id_supplier}}">{{ $supplier->nama}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="add_id_produk" class="form-label">Produk <span class="required" style="color: red;">*</span></label>
                                          <select class="form-select" id="add_id_produk" name="id_produk" required>
                                              @foreach ($produk as $prod)
                                                  <option value="{{ $prod->id_produk }}">{{ $prod->nama_produk }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="add_harga_beli" class="form-label">Harga Beli <span class="required" style="color: red;">*</span></label>
                                          <input type="number" class="form-control" id="add_harga_beli" name="harga_beli" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="add_jumlah" class="form-label">Jumlah <span class="required" style="color: red;">*</span></label>
                                          <input type="number" class="form-control" id="add_jumlah" name="jumlah" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="add_tanggal_transaksi" class="form-label">Tanggal Transaksi <span class="required" style="color: red;">*</span></label>
                                          <input type="date" class="form-control tanggal-transaksi" id="add_tanggal_transaksi" name="tanggal_transaksi" required>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-primary">Tambah Data</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  
              <!-- Modal Edit Data -->
              <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editForm" method="POST" action="{{ route('transaksi_supplier.update', 'id_transaksi') }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Transaksi Supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_transaksi" id="edit_id">
                                <div class="mb-3">
                                    <label for="edit_id_supplier" class="form-label">Supplier <span class="required" style="color: red;">*</span></label>
                                    <select class="form-select" id="edit_id_supplier" name="id_supplier" required>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id_supplier }}">{{ $supplier->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_id_produk" class="form-label">Produk <span class="required" style="color: red;">*</span></label>
                                    <select class="form-select" id="edit_id_produk" name="id_produk" required>
                                        @foreach ($produk as $prod)
                                            <option value="{{ $prod->id_produk }}">{{ $prod->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_harga_beli" class="form-label">Harga Beli <span class="required" style="color: red;">*</span></label>
                                    <input type="number" class="form-control" id="edit_harga_beli" name="harga_beli" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_jumlah" class="form-label">Jumlah <span class="required" style="color: red;">*</span></label>
                                    <input type="number" class="form-control" id="edit_jumlah" name="jumlah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_tanggal_transaksi" class="form-label">Tanggal Transaksi <span class="required" style="color: red;">*</span></label>
                                    <input type="date" class="form-control tanggal-transaksi" id="edit_tanggal_transaksi" name="tanggal_transaksi" required>
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
            

                  <!-- Tabel -->
                  <table class="example table table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Supplier</th>
                              <th>Produk</th>
                              <th>Harga Beli</th>
                              <th>Jumlah</th>
                              <th>Tanggal Transaksi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($transaksiSuppliers as $item)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->supplier->nama }}</td>
                                  <td>{{ $item->produk->nama_produk }}</td>
                                  <td>{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                  <td>{{ $item->jumlah }}</td>
                                  <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d-m-Y') }}</td>
                                  <td>
                                      <button class="btn btn-sm btn-warning editBtn"
                                          data-id="{{ $item->id_transaksi }}"
                                          data-id_supplier="{{ $item->id_supplier }}"
                                          data-id_produk="{{ $item->id_produk }}"
                                          data-harga_beli="{{ $item->harga_beli }}"
                                          data-jumlah="{{ $item->jumlah }}"
                                          data-tanggal_transaksi="{{ $item->tanggal_transaksi }}"
                                          data-bs-toggle="modal"
                                          data-bs-target="#editModal">
                                          Edit
                                      </button>

                                      <form action="{{ route('transaksi_supplier.destroy', $item->id_transaksi) }}" method="POST" style="display:inline-block;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                              Hapus
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              
              <script>
                document.addEventListener("DOMContentLoaded", function () {
                  const editBtns = document.querySelectorAll(".editBtn");
                  const editForm = document.getElementById("editForm");

                  editBtns.forEach((btn) => {
                      btn.addEventListener("click", function () {
                          const id = this.getAttribute("data-id");
                          const id_supplier = this.getAttribute("data-id_supplier");
                          const id_produk = this.getAttribute("data-id_produk");
                          const harga_beli = this.getAttribute("data-harga_beli");
                          const jumlah = this.getAttribute("data-jumlah");
                          const tanggal_transaksi = this.getAttribute("data-tanggal_transaksi");

                          editForm.action = `/transaksi_supplier/${id}`;
                          
                          document.getElementById("edit_id").value = id;
                          document.getElementById("edit_id_supplier").value = id_supplier;
                          document.getElementById("edit_id_produk").value = id_produk;
                          document.getElementById("edit_harga_beli").value = harga_beli;
                          document.getElementById("edit_jumlah").value = jumlah;
                          document.getElementById("edit_tanggal_transaksi").value = tanggal_transaksi;
                      });
                  });
              });
              </script>
              <script>
                // Fungsi untuk mengatur max date pada elemen input
                function setMaxDate() {
                    const today = new Date().toISOString().split('T')[0]; // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
                    const dateInputs = document.querySelectorAll('.tanggal-transaksi');
                    dateInputs.forEach(input => {
                        input.setAttribute('max', today); // Menetapkan nilai max ke tanggal hari ini
                    });
                }
            
                // Panggil fungsi saat halaman dimuat
                window.onload = setMaxDate;
            </script>
            
          </div>
      </div>
    </div>
</main>
@endsection
