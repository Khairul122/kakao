@extends('layouts.Admin.app')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Data Supplier</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Supplier</li>
            </ol>
          </div>
        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-12">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">List Data Supllier</h3>
                            <!-- Tombol Tambah Data di kanan -->
                            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
                        </div>
                    
                        <div class="card-body">
                            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="addForm" method="POST" action="{{ route('supplier.store') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addModalLabel">Tambah Supplier</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="add_nama" class="form-label">Nama <span class="required" style="color: red;">*</span>
                                                        </label>
                                                    <input type="text"  class="form-control" id="add_nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="add_alamat" class="form-label">Alamat <span class="required" style="color: red;">*</span>
                                                        </label>
                                                    <input type="text"  class="form-control" id="add_alamat" name="alamat" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="add_no_hp" class="form-label">No HP <span class="required" style="color: red;">*</span>
                                                        </label>
                                                    <input type="text"  class="form-control" id="add_no_hp" name="no_hp" required>
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
                        
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="editForm" method="POST" action="{{ route('supplier.update', 'id_supplier') }}">
                                            @csrf
                                            @method('PUT')  <!-- Method PUT untuk edit data -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Supplier </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_supplier" id="edit_id_supplier">
                                                <div class="mb-3">
                                                    <label for="edit_nama" class="form-label">Nama <span class="required" style="color: red;">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="edit_nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_alamat" class="form-label">Alamat <span class="required" style="color: red;">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="edit_alamat" name="alamat" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_no_hp" class="form-label">No HP <span class="required" style="color: red;">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="edit_no_hp" name="no_hp" required>
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
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supply)
                                     <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$supply->nama}}</td>
                                        <td>{{$supply->alamat}}</td>
                                        <td>{{$supply->no_hp}}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-sm btn-warning editBtn"
                                                data-id="{{ $supply->id_supplier }}"
                                                data-nama="{{ $supply->nama }}"
                                                data-alamat="{{ $supply->alamat }}"
                                                data-no_hp="{{ $supply->no_hp }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                Edit
                                            </button>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('supplier.destroy', $supply->id_supplier) }}" method="POST" style="display:inline-block;">
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
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                const editBtns = document.querySelectorAll(".editBtn");
                                const editForm = document.getElementById("editForm");
    
                                editBtns.forEach((btn) => {
                                        btn.addEventListener("click", function () {
                                            const id = this.getAttribute("data-id");
                                            const nama = this.getAttribute("data-nama");
                                            const alamat = this.getAttribute("data-alamat");
                                            const no_hp = this.getAttribute("data-no_hp");
                                            // Menentukan URL untuk action form sesuai dengan id_user
                                            editForm.action = `/supplier/${id}`; // Sesuaikan URL ini dengan route resource Anda
                                                // Untuk memastikan id yang diambil benar
    
                                            // Isi data ke dalam form modal
                                            document.getElementById("edit_id_supplier").value = id;
                                            document.getElementById("edit_nama").value = nama;
                                            document.getElementById("edit_alamat").value = alamat;
                                            document.getElementById("edit_no_hp").value = no_hp;
                                        });
                                    });
                                });
    
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection