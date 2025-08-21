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
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <div class="col-md-12">
              <div class="card mb-12">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title" style="flex-grow: 1;">List Data Pengguna</h3>
                    <form action="/laporanpenggunapdf" method="GET">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </form>
                </div>
              
                <div class="card-body">
                 
              
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
                          </tr>
                      </tfoot>
                  </table>
              </div>
           
              
              </div>
          </div>
          <!-- /.col -->
      </div>
      
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content-->
  </main>
@endsection