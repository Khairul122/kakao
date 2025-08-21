@extends('layouts.Admin.app')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Data Pengguna</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-12">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">List Data Pengguna</h3>
                            <!-- Tombol Tambah Data di kanan -->
                            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
                        </div>
                    
                        <div class="card-body">
                        <!-- Modal Tambah Data -->
                            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="addForm" method="POST" action="{{ route('pengguna.store') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addModalLabel">Tambah Pengguna</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="add_nama" class="form-label">Nama <span class="required" style="color: red;">*</span>
                                                        </label>
                                                    <input type="text"  class="form-control" id="add_nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="add_email" class="form-label">Email <span class="required" style="color: red;">*</span>
                                                        </label>
                                                    <input type="email"  class="form-control" id="add_email" name="email" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="add_password" class="form-label">Password <span class="required" style="color: red;">*</span>
                                                        </label>
                                                    <input type="password"  class="form-control" id="add_password" name="password" required>
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
                                                <div class="mb-3">
                                                    <label for="add_role" class="form-label">Role <span class="required" style="color: red;">*</span>
                                                        </label>
                                                    <select class="form-select" required id="add_role" name="role" required>
                                                        <option value="admin">Admin</option>
                                                        <option value="pelanggan">Pelanggan</option>
                                                        <option value="penjual">Penjual</option>
                                                        <option value="supplier">Supplier</option>
                                                    </select>
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
                                        <form id="editForm" method="POST" action="{{ route('pengguna.update', 'id_user') }}">
                                            @csrf
                                            @method('PUT')  <!-- Method PUT untuk edit data -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Pengguna </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_user" id="edit_id_user">
                                                <div class="mb-3">
                                                    <label for="edit_nama" class="form-label">Nama <span class="required" style="color: red;">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="edit_nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_email" class="form-label">Email <span class="required" style="color: red;">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" id="edit_email" name="email" required>
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
                                                <div class="mb-3">
                                                    <label for="edit_role" class="form-label">Role <span class="required" style="color: red;">*</span>
                                                    </label>
                                                    <select class="form-select" id="edit_role" name="role" required>
                                                        <option value="admin">Admin</option>
                                                        <option value="pelanggan">Pelanggan</option>
                                                        <option value="penjual">Penjual</option>
                                                        <option value="supplier">Supplier</option>
                                                    </select>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-warning editBtn"
                                                    data-id="{{ $item->id_user }}"
                                                    data-nama="{{ $item->nama }}"
                                                    data-email="{{ $item->email }}"
                                                    data-alamat="{{ $item->alamat }}"
                                                    data-no_hp="{{ $item->no_hp }}"
                                                    data-role="{{ $item->role }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal">
                                                    Edit
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('pengguna.destroy', $item->id_user) }}" method="POST" style="display:inline-block;">
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                            const editBtns = document.querySelectorAll(".editBtn");
                            const editForm = document.getElementById("editForm");

                            editBtns.forEach((btn) => {
                                    btn.addEventListener("click", function () {
                                        const id = this.getAttribute("data-id");
                                        const nama = this.getAttribute("data-nama");
                                        const email = this.getAttribute("data-email");
                                        const alamat = this.getAttribute("data-alamat");
                                        const no_hp = this.getAttribute("data-no_hp");
                                        const role = this.getAttribute("data-role");
                                        // Menentukan URL untuk action form sesuai dengan id_user
                                        editForm.action = `/pengguna/${id}`; // Sesuaikan URL ini dengan route resource Anda
                                            // Untuk memastikan id yang diambil benar

                                        // Isi data ke dalam form modal
                                        document.getElementById("edit_id_user").value = id;
                                        document.getElementById("edit_nama").value = nama;
                                        document.getElementById("edit_email").value = email;
                                        document.getElementById("edit_alamat").value = alamat;
                                        document.getElementById("edit_no_hp").value = no_hp;
                                        document.getElementById("edit_role").value = role;
                                    });
                                });
                            });

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection