@extends('layoutes.main')

@section('content')

<h2>Daftar Paket Kerja</h2>

{{-- Flash Message Success --}}
@if(session('success'))
    <div style="padding:10px; background:#d4edda; color:#155724; margin-bottom:10px; border:1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

{{-- Flash Message Error --}}
@if(session('error'))
    <div style="padding:10px; background:#f8d7da; color:#721c24; margin-bottom:10px; border:1px solid #f5c6cb;">
        {{ session('error') }}
    </div>
@endif

<a href="{{ route('paketkerja.create') }}"
   style="display:inline-block; margin-bottom:10px; padding:6px 12px; background:#007bff; color:white; text-decoration:none;">
   + Tambah Paket Kerja
</a>

<table border="1" width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">
    <thead style="background:#f2f2f2;">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Paket Kerja</th>
            <th>Tipe</th>
            <th>Biaya Akumulasi</th>
            <th>Biodata</th>
            <th>Status</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($paketKerjas as $index => $paket)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $paket->kode }}</td>
            <td>{{ $paket->paketkerja }}</td>
            <td>{{ $paket->tipe }}</td>
            <td>Rp {{ number_format($paket->biayaakumulasi, 2, ',', '.') }}</td>
            <td>{{ $paket->biodata }}</td>
            <td>
                @if($paket->status)
                    <span style="color:green;">Aktif</span>
                @else
                    <span style="color:red;">Nonaktif</span>
                @endif
            </td>
            <td>

                {{-- Tombol Edit --}}
                <a href="{{ route('paketkerja.edit', ['paketkerja' => $paket->id]) }}"
                   style="padding:4px 8px; background:#ffc107; color:black; text-decoration:none;">
                   Edit
                </a>

                {{-- Tombol Delete --}}
                <form action="{{ route('paketkerja.destroy', $paket->id) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            style="padding:4px 8px; background:#dc3545; color:white; border:none; cursor:pointer;">
                        Hapus
                    </button>
                </form>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align:center;">Belum ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
