<div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false"
      >
       
        <li class="nav-item">
          <a href="/home" class="nav-link {{ Request::is('/home') ? 'active' : '' }}">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Home</p>
          </a>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
          <a href="/pengguna" class="nav-link {{ Route::is('pengguna.index') ? 'active' : '' }}">
            <i class="nav-icon bi bi-people"></i>
            <p>Pengguna</p>
          </a>
        </li>
         <li class="nav-item">
          <a href="/supplier" class="nav-link {{ Route::is('supplier.index') ? 'active' : '' }}">
            <i class="nav-icon bi bi-basket3"></i>
            <p>Supplier</p>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="/kelolaproduk" class="nav-link {{ Route::is('kelolaroduk.index') ? 'active' : '' }}">
            <i class="nav-icon bi bi-clipboard-heart"></i>
            <p>Kelola Produk</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/kelolapesanan" class="nav-link {{ Route::is('kelolapesanan.index') ? 'active' : '' }}">
            <i class="nav-icon bi bi-shop-window"></i>
            <p>Kelola Pesanan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi  bi-archive"></i>
            <p>
              Laporan
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if (Auth::user()->role == 'admin')
            <li class="nav-item">
              <a href="/laporanpengguna" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Laporan Pengguna</p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="/laporanproduk" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Laporan Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/laporanpesanan" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Laporan Pesanan</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="/laporanpesanan" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Laporan Keuangan</p>
              </a>
            </li> --}}
          </ul>
        </li>
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>