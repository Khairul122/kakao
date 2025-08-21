<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Pacifico&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 280mm; /* Reduce container width to fit content */
            height: 190mm; /* Adjust height to better fit A4 landscape */
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 20px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .logo img {
            width: 60px;
            height: auto;
        }

        .company-details {
            text-align: left;
        }

        .company-details h2, .company-details p {
            margin: 0;
        }

        .title {
            text-align: center;
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: auto; /* Allow table to adjust to content */
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }

        .signature-section {
            margin-top: 30px;
            text-align: right; /* Align to the right */
            width: 100%;
            overflow: hidden;
        }

        .signature-line {
            border-top: 1px solid black;
            width: 200px;
            margin: 20px auto;
        }

        .signature-name {
            font-weight: bold;
        }

        .footer {
            text-align: right;
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
           
            <div class="company-details">
                <h2>PT.PAII | Outstock</h2>
                <p>Kota Pariaman</p>
            </div>
        </div>

        <div class="title">DAFTAR PEMBELIAN</div>
        <p class="footer">Tanggal Cetak: {{ now()->format('d/m/Y') }}</p> <!-- Current Date -->

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Harga Total</th>
                    <th>User Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $key => $pesanan)
                    @foreach ($pesanan->detailPesanans as $detail)
                        <tr>
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
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Harga Total</th>
                    <th>User Data</th>
                </tr>
            </tfoot>
        </table>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Keterangan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Pendapatan dari Pesanan</td>
                    <td>Rp {{ number_format($totalPendapatan, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Total Pengeluaran untuk Pembelian Stok</td>
                    <td>Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Laba Bersih</td>
                    <td>Rp {{ number_format($labaBersih, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
      
        <div class="signature-section">
            <div class="signature-name" style="font-family: 'Dancing Script', cursive; font-size: 28px;">Jon Raidi</div>
            <br><br><br>
            <p style="font-family: 'Dancing Script', cursive; font-size: 14px;">Manager PT.PAII Kota Pariaman</p>
        </div>
        
    </div>
</body>
</html>
