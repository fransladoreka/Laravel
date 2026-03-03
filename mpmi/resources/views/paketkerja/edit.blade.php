@extends('layoutes.main')

@section('content')
<h2>Edit Paket Kerja</h2>

@if (session('success'))
<div style="color:green;">{{ session('success') }}</div>
@endif

<form action="{{ route('paketkerja.update', $paketKerja->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="kode">Kode:</label>
        <input type="text" name="kode" id="kode" value="{{ old('kode', $paketKerja->kode) }}">
        @error('kode')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="paketkerja">Paket Kerja:</label>
        <input type="text" name="paketkerja" id="paketkerja" value="{{ old('paketkerja', $paketKerja->paketkerja) }}">
        @error('paketkerja')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="tipe">Tipe:</label>
        <input type="text" name="tipe" id="tipe" value="{{ old('tipe', $paketKerja->tipe) }}">
        @error('tipe')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="biayaakumulasi">Biaya Akumulasi:</label>
        <input type="number" step="0.01" name="biayaakumulasi" id="biayaakumulasi" value="{{ old('biayaakumulasi', $paketKerja->biayaakumulasi) }}">
        @error('biayaakumulasi')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="biodata">Biodata:</label>
        <input type="text" name="biodata" id="biodata" value="{{ old('biodata', $paketKerja->biodata) }}">
        @error('biodata')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="1" {{ old('status', $paketKerja->status) == 1 ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ old('status', $paketKerja->status) == 0 ? 'selected' : '' }}>Nonaktif</option>
        </select>
        @error('status')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Update</button>
</form>

<a href="{{ route('paketkerja.index') }}">Kembali ke Daftar Paket Kerja</a>
@endsection
