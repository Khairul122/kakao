<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;

use App\Http\Controllers\penggunaController as Pengguna;
use App\Http\Controllers\ProdukController as KelolaProduk;
use App\Http\Controllers\subscribeController as subscribe;
use App\Http\Controllers\detailProduct as detailProduct;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PesananSaya as PesananSaya;
use App\Http\Controllers\kelolaPesanan as kelolaPesanan;
use App\Http\Controllers\UlasanController as UlasanController;
use App\Http\Controllers\laporanPengguna as laporanPengguna;
use App\Http\Controllers\laporanPesanan as laporanPesanan;
use App\Http\Controllers\laporanProduk as laporanProduk;
use App\Http\Controllers\TransaksiSupplierController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\SupplierController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/', subscribe::class);
Route::resource('myorder', PesananSaya::class);
Route::resource('pesanan', PesananController::class);
Route::resource('detail-pesanan', DetailPesananController::class);
Route::resource('ulasan', UlasanController::class);


Route::get('/detail/{id}', [detailProduct::class,'detail'])->name('detaildataProduk');
Auth::routes();

Route::middleware('auth')->group(function () {
    
    Route::middleware(['role:admin,penjual'])->group(function () {
        Route::get('/home', function () {
            // Ambil data dari tabel pesanans
            $titpes = Pesanan::count();
            $titpro = Produk::count();
            $lespro = Produk::where('stok','=','0')->count();
            $titur = User::count();
            $pesanans = Pesanan::selectRaw('DATE(tanggal_pesanan) as date, status, SUM(total_harga) as total_harga')
                            ->groupByRaw('DATE(tanggal_pesanan), status')
                            ->whereYear('tanggal_pesanan', Carbon::now()->year) // Ambil data tahun ini
                            ->orderBy('date')
                            ->get();
        
            // Inisialisasi array untuk menyimpan data grafik
            $categories = [];
            $pending = [];
            $proses = [];
            $selesai = [];
            $batal = [];
        
            // Proses data untuk grafik
            foreach ($pesanans as $pesanan) {
                // Pastikan tanggal_pesanan diubah menjadi objek Carbon
                $categories[] = Carbon::parse($pesanan->date)->format('Y-m-d'); // Format tanggal untuk x-axis
        
                // Mengelompokkan total harga berdasarkan status
                switch ($pesanan->status) {
                    case 'pending':
                        $pending[] = (float) $pesanan->total_harga;
                        break;
                    case 'proses':
                        $proses[] = (float) $pesanan->total_harga;
                        break;
                    case 'selesai':
                        $selesai[] = (float) $pesanan->total_harga;
                        break;
                    case 'batal':
                        $batal[] = (float) $pesanan->total_harga;
                        break;
                }
            }
        
            // Pastikan kategori tanggal yang ada konsisten (untuk menjaga keselarasan dengan data status)
            $all_dates = array_unique($categories);
            sort($all_dates); // Urutkan tanggal
        
            return view('home', compact('all_dates','lespro', 'pending', 'proses', 'selesai', 'batal','titpes','titpro','titur'));
        })->name('home');
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('laporanpengguna', laporanPengguna::class);
        Route::get('/laporanpenggunapdf', [laporanPengguna::class, 'generatepenggunaPDF']);
            Route::resource('pengguna', Pengguna::class)->parameters([
                'pengguna' => 'id_user',  // Menggunakan id_user daripada id
            ]);
            Route::resource('supplier', SupplierController::class);
        });
    Route::middleware(['role:admin,penjual'])->group(function () {
        Route::resource('kelolaproduk', KelolaProduk::class);
        Route::resource('kelolapesanan', kelolaPesanan::class);
        Route::resource('transaksi_supplier', TransaksiSupplierController::class);
        
       
        Route::patch('kelolapesanan/{id_pesanan}/proses', [kelolaPesanan::class, 'proses'])->name('kelolapesanan.proses');
        Route::patch('kelolapesanan/{id_pesanan}/selesai', [kelolaPesanan::class, 'selesai'])->name('kelolapesanan.selesai');
        Route::patch('kelolapesanan/{id_pesanan}/batal', [kelolaPesanan::class, 'batal'])->name('kelolapesanan.batal');
        Route::post('/pesanan/upload-bukti/{id}', [PesananController::class, 'uploadBukti'])->name('pesanan.upload_bukti');
        Route::put('transaksi_supplier/{id_transaksi}', [TransaksiSupplierController::class, 'update'])->name('transaksi_supplier.update');




        Route::get('/laporanpesananpdf', [laporanPesanan::class, 'generatepesananPDF']);
       
        Route::get('/laporanprodukpdf', [laporanProduk::class, 'generateprodukPDF']);
        Route::get('/laporan-keuangan', [FinanceController::class, 'index'])->name('laporan.keuangan');
        
        Route::resource('laporanproduk', laporanProduk::class);
        Route::resource('laporanpesanan', laporanPesanan::class);
    });


    Route::get('/myorder_print', [laporanPesanan::class, 'myorderPDF']);
    Route::get('/checkout/view', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::patch('myorder/{id}/selesai', [PesananSaya::class, 'selesai'])->name('myorder.selesai');

    

   



});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
