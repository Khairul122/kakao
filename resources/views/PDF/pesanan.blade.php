<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pembelian</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        @page {
            margin: 20px;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .header {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            text-align: center;
        }
        .company-details p {
            margin: 0;
            text-align: center;
        }
        .footer {
            text-align: right;
            font-size: 12px;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            page-break-inside: auto;
        }
        thead {
            display: table-header-group;
        }
        tfoot {
            display: table-footer-group;
        }
        tr {
            page-break-inside: avoid;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }
        .signature-section {
            margin-top: 40px;
        }
        .signature-date {
            font-size: 14px;
            margin-bottom: 40px;
        }
        .signature-name {
            font-family: 'Dancing Script', cursive;
            font-size: 16px;
            margin-left: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>DAFTAR PEMBELIAN</h2>
            <div class="company-details">
                <p>PT.PAII | Outstock</p>
                <p>Kota Pariaman</p>
            </div>
        </div>

        <p class="footer">Tanggal Cetak: {{ now()->format('d/m/Y') }}</p>

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
                            <td>{{ $pesanan->user->alamat ?? 'Alamat tidak ditemukan' }}</td>
                            <td>{{ $detail->produk->nama_produk }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>Rp{{ number_format($detail->harga_satuan, 2) }}</td>
                            <td>Rp{{ number_format($detail->jumlah * $detail->harga_satuan, 2) }}</td>
                            <td>
                                {{ $pesanan->user->email ?? '-' }}<br>
                                {{ $pesanan->user->no_hp ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <table>
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
                    <td>Total Pengeluaran untuk Pembelian Produk</td>
                    <td>Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td><strong>Laba Bersih</strong></td>
                    <td><strong>Rp {{ number_format($labaBersih, 2, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="signature-section">
            <div class="signature-date">Kota Pariaman, {{ now()->format('d/m/Y') }}</div>
            <div class="signature-name">MANAGER</div>
            <br><br><br>
            <div class="signature-name">(Jon Raidi)</div>
        </div>
    </div>
</body>
</html>
