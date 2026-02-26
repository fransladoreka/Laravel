<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketKerja;

class PaketKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketKerjas = PaketKerja::all();
        return view('paketkerja.index', compact('paketKerjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paketkerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:paket_kerjas,kode',
            'paketkerja' => 'required|string|max:255',
            'tipe' => 'required|string|max:100',
            'biayaakumulasi' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ], [
            'kode.required' => 'Kode paket wajib diisi.',
            'kode.unique' => 'Kode paket sudah ada.',
            'paketkerja.required' => 'Nama paket kerja wajib diisi.',
            'tipe.required' => 'Tipe paket wajib diisi.',
            'biayaakumulasi.required' => 'Biaya akumulasi wajib diisi.',
            'biayaakumulasi.numeric' => 'Biaya harus berupa angka.',
            'status.required' => 'Status wajib dipilih.',
            'status.boolean' => 'Status harus aktif (1) atau nonaktif (0).',
        ]);

        PaketKerja::create($request->all());

        return redirect()->route('paketkerja.index')
            ->with('success', 'Data paket kerja berhasil ditambahkan.');
    }

    // Tampilkan detail paket kerja
    public function show(PaketKerja $paketKerja)
    {
        return view('paketkerja.show', compact('paketKerja'));
    }

    // Form edit paket kerja
    public function edit(string $id)
    {
        // Tambahkan pengecekan untuk memastikan paketKerja ada
        $paketKerja = PaketKerja::find($id);

        if (!$paketKerja) {
            abort(404);  // If no record is found, abort with 404 error
        }
        return view('paketkerja.edit', compact('paketKerja'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|unique:paket_kerjas,kode,'.$id,
            'paketkerja' => 'required|string|max:255',
            'tipe' => 'required|string|max:100',
            'biayaakumulasi' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ], [
            'kode.required' => 'Kode paket wajib diisi.',
            'kode.unique' => 'Kode paket sudah ada.',
            'paketkerja.required' => 'Nama paket kerja wajib diisi.',
            'tipe.required' => 'Tipe paket wajib diisi.',
            'biayaakumulasi.required' => 'Biaya akumulasi wajib diisi.',
            'biayaakumulasi.numeric' => 'Biaya harus berupa angka.',
            'status.required' => 'Status wajib dipilih.',
            'status.boolean' => 'Status harus aktif (1) atau nonaktif (0).',
        ]);
        $paketKerja = PaketKerja::find($id);

        if (!$paketKerja) {
            abort(404);  // If no record is found, abort with 404 error
        }
        $paketKerja->update($request->all());

        return redirect()->route('paketkerja.index')
            ->with('success', 'Data paket kerja berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
