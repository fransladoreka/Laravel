@extends('layoutes.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-body d-flex flex-column">
            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 fw-semibold">Biodata Pegawai Migran</h5>
                <div>
                    <button class="btn btn-outline-danger btn-sm me-2">Kembali</button>
                    <!-- <button class="btn btn-primary btn-sm"
                        id="btnSimpan">Simpan</button> -->
                    <a href="{{ route('datamigran.pdf', $dataMigran->id) }}" target="_blank">
                        <button type="button">Cetak PDF</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Kolom 1 (kiri) - 50% lebar pada desktop, 100% pada mobile -->
            <div class="col-md-6">
                <p>Nama: {{ $dataMigran->nama }}</p>
                <p>NIK: {{ $dataMigran->nik }}</p>
                <p>Alamat: {{ $dataMigran->alamat }}</p>
                <p>Tanggal Lahir: {{ \Carbon\Carbon::parse($dataMigran->tgl_lahir)->format('d-m-Y') }}</p>
                <p>Tempat Lahir: {{ $dataMigran->tempat_lahir }}</p>
            </div>
            <!-- Kolom 2 (kanan) - 50% lebar pada desktop, 100% pada mobile -->
            <div class="col-md-6">
                @php
                $pasFoto = $dataMigran->dokumen->where('jenis', 'pas_foto')->first();
                @endphp

                @if($pasFoto)
                <div style="text-align: center;">
                    <img src="{{ asset('storage/' . $pasFoto->file_path) }}" width="200">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
