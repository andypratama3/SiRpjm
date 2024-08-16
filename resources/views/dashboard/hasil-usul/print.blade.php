<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Hasil Usul</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            /* background-color: #4CAF50; */
            color: black;
            font-size: 18px;
        }

        @media print {
            .table-responsive {
                overflow: auto !important;
            }
        }
    </style>
</head>
<body>

        <h2 style="text-align: center">Data Hasil Usul</h2>
        <table >
                <tr>
                    <th>No</th>
                    <th >Gagasan Kegiatan</th>
                    <th>Lokasi</th>
                    <th>Volume</th>
                    <th>Satuan</th>
                    <th>Jabatan</th>
                    <th>Nomor</th>
                    <th>Biaya Tafsiran</th>
                    <th>Tahun Prioritas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuls as $usul)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $usul->name }}</td>
                    <td>{{ $usul->lokasi }}</td>
                    <td>{{ $usul->volume }}</td>
                    <td>{{ $usul->satuan }}</td>
                    <td>{{ $usul->user->jabatan }}</td>
                    <td>{{ $usul->user->nomor }}</td>
                    <td>{{ $usul->biaya }}</td>
                    <td>{{ $usul->tahun_prioritas }}</td>
                    <td>
                        @if ($usul->status == 'DiTerima')
                            <span class="badge badge-sm bg-gradient-success">Di Terima</span>
                        @elseif ($usul->status == 'DiTolak')
                            <span class="badge badge-sm bg-gradient-danger">Di Tolak</span>
                        @else
                            <span class="badge badge-sm bg-gradient-warning">Menunggu</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <script>
        window.print();
    </script>
</body>
</html>

