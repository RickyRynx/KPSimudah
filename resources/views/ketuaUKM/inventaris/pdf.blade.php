<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi UKM dan HMJ MDP (SIMUDAH MDP)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 90px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            flex-grow: 1;
        }

        .spacer {
            width: 100px;
        }

        table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        thead th {
            border: 1px solid black;
            padding: 10px;
            background-color: #f2f2f2;
        }

        tbody td {
            border: 1px solid black;
            padding: 10px;
        }

        footer {
            width: 100%;
            font-size: 12px;
            padding: 10px;
            border-top: 1px solid #000;
            display: flex;
            /* justify-content: space-between; */
            align-items: center;
            position: fixed;
            bottom: 0;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }

        hr {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ $base64Logo }}" alt="logo" class="logo">
        <h1>Sistem Informasi UKM dan HMJ MDP (SIMUDAH MDP)</h1>
        <div class="spacer"></div>
    </header>
    <hr>

    <h1 class="mt-3">Laporan Inventaris {{ $ukm->nama_ukm }}</h1>
    <table class="mt-2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Jumlah Rusak</th>
                <th>Jumlah Bagus</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventaris as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->jumlah_rusak }}</td>
                    <td>{{ $item->jumlah_bagus }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        <div class="footer-left">
            <p>Dibuat oleh:</p>
            <p>Ketua UKM</p>
            <br><br><br>
            <p>{{ $user->name }}</p>
        </div>
    </footer>

    <footer>
        <div class="footer-right">
            <p>Diketahui oleh:</p>
            <p>Pembina UKM</p>
            <br><br><br>
            <p>{{ $ukm->pembina->name }}</p>
        </div>
    </footer>
</body>

</html>
