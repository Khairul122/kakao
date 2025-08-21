<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 20px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #b45309;
        }
        .section {
            margin-top: 20px;
        }
        .bold {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #b45309;
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">FAKTUR</div>
    
    <div class="section">
        <p><span class="bold">KEPADA:</span><br>
        {{Auth::user()->nama}}<br>
        {{Auth::user()->no_hp}} | {{Auth::user()->email}}<br>
        {{Auth::user()->alamat}}</p>
        <p style="text-align: right;">{{ \Carbon\Carbon::now()->format('d F Y') }}<br>Faktur No. NF{{Auth::user()->id_user}}</p>
    </div>
    
    <table>
        <tr>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
        @foreach ($pesanans as $pesanan)
        @foreach ($pesanan->detailPesanans as $detail)
        <tr>
            <td> {{ $detail->produk->nama_produk ?? 'Produk Tidak Ditemukan' }}</td>
            <td> {{ $detail->jumlah }}</td>
            <td> <span class="amount">Rp. {{ number_format($detail->harga_satuan, 2) }}</td>
            <td> <span class="amount">Rp. {{ number_format($detail->jumlah * $detail->harga_satuan, 2) }}</span></td>
        </tr>
        @endforeach
        @endforeach
       
        
    </table>
    
    <p class="total"><span>Total : Rp. {{ number_format($totalBelanja, 2) }}</span></p>
    
    <div class="footer">
        <p><span class="bold">Informasi Tambahan:</span><br>
            Simpan Struk ini jika terjadi masalah <br>
       
    </div>
</body>
</html>
