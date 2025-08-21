<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
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
            width: 100%;
            overflow: hidden;
        }

        .signature-line {
            border-top: 1px solid black;
            width: 200px;
            margin: 20px auto;
        }

        .footer {
            text-align: right;
            font-size: 12px;
            margin-top: 10px;
        }

        .signature-container {
            text-align: left;
            font-family: 'Dancing Script', cursive;
        }

        .signature-date {
            font-size: 16px;
        }

        .signature-name {
            font-size: 16px;
            margin-top: 5px;
            margin-left: 50px;
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

        <div class="title">DAFTAR PENGGUNA</div>
        <p class="footer">Tanggal Cetak: {{ now()->format('d/m/Y') }}</p> <!-- Current Date -->

        <table>
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
            
        </table>

        <div class="signature-section">
            <div class="signature-container">
                <div class="signature-date">Kota Pariaman, {{ now()->format('d/m/Y') }}</div>
                <div class="signature-name" > MANAGER</div>

                <br><br>
                <div class="signature-name" > (Jon Raidi)</div>

            </div>
        </div>
        
    </div>
</body>
</html>
