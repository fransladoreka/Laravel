<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Migran</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 20mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }

        h2,
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 15px;
        }

        /* Tabel Data Pribadi */
        .data-pribadi table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-pribadi td {
            padding: 3px 5px;
            vertical-align: top;
        }

        .data-pribadi td.label {
            width: 150px;
            font-weight: bold;
        }

        .data-pribadi td.sep {
            width: 10px;
        }

        /* Dokumen */
        .dokumen img {
            display: block;
            max-width: 200px;
            margin: 5px auto;
            height: auto;
        }

        /* Tabel Pengalaman Kerja */
        table.pengalaman {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table.pengalaman,
        table.pengalaman th,
        table.pengalaman td {
            border: 1px solid black;
        }

        table.pengalaman th,
        table.pengalaman td {
            padding: 5px;
            text-align: left;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <h2>Data Migran</h2>

    <!-- Data Pribadi -->
    <div class="section data-pribadi">
        <h3>Data Pribadi</h3>
        <table>
            <tr>
                <td class="label">Nama</td>
                <td class="sep">:</td>
                <td>{{ $dataMigran->nama }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="sep">:</td>
                <td>{{ $dataMigran->nik }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="sep">:</td>
                <td>{{ $dataMigran->gender }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Lahir</td>
                <td class="sep">:</td>
                <td>{{ \Carbon\Carbon::parse($dataMigran->tgl_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="label">Tempat Lahir</td>
                <td class="sep">:</td>
                <td>{{ $dataMigran->tempat_lahir }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="sep">:</td>
                <td>{{ $dataMigran->alamat }}</td>
            </tr>
            <tr>
                <td class="label">Provinsi</td>
                <td class="sep">:</td>
                <td>{{ $dataMigran->provinsi }}</td>
            </tr>
            <tr>
                <td class="label">Ex Taiwan</td>
                <td class="sep">:</td>
                <td>{{ $dataMigran->ex_taiwan ? 'Ya' : 'Tidak' }}</td>
            </tr>
        </table>
    </div>

    <!-- Dokumen -->
    <div class="section dokumen">
        <h3>Dokumen</h3>
        @foreach ($dataMigran->dokumen as $dokumen)
        <p style="text-align:center;"><strong>{{ ucwords(str_replace('_',' ',$dokumen->jenis)) }}</strong></p>
        <img src="{{ public_path('storage/' . $dokumen->file_path) }}" alt="{{ $dokumen->jenis }}">
        @endforeach
    </div>

    <!-- Pengalaman Kerja -->
    <div class="section">
        <h3>Pengalaman Kerja</h3>
        @if($dataMigran->pengalaman->count() > 0)
        <table class="pengalaman">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Negara</th>
                    <th>Posisi</th>
                    <th>Isi Pekerjaan</th>
                    <th>Tahun Mulai</th>
                    <th>Tahun Selesai</th>
                    <th>Alasan Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataMigran->pengalaman as $index => $pengalaman)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pengalaman->negara }}</td>
                    <td>{{ $pengalaman->posisi }}</td>
                    <td>{{ $pengalaman->working_content }}</td>
                    <td>{{ $pengalaman->mulai }}</td>
                    <td>{{ $pengalaman->selesai }}</td>
                    <td>{{ $pengalaman->alasan_keluar }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Tidak ada pengalaman kerja</p>
        @endif
    </div>

</body>

</html>
