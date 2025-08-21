<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Laporan Keuangan</h2>
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
    </div>
    <div class="container">
        <h1>Laporan Keuntungan</h1>
        <div class="card">
            <div class="card-header">Keuntungan Total</div>
            <div class="card-body">
                <h4>Total Keuntungan: Rp {{ number_format($keuntungan, 2, ',', '.') }}</h4>
            </div>
        </div>
    </div>
</body>
</html>