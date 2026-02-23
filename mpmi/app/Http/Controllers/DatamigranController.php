<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DatamigranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all(), $request->file());
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'gender' => 'required|in:Laki Laki,Perempuan',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'provinsi' => 'required',
            'ex_taiwan' => 'required',
            'jenis_paket' => 'required',
            'paket_kerja' => 'required',
            'glasses' => 'required',
            'medical' => 'required',
            'call_visa' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'nama_kontak_darurat' => 'required',
            'nomor_kontak_darurat' => 'required',
            'dokumen.pas_foto' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nik.required' => 'NIK wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'agama.required' => 'Agama wajib dipilih.',
            'provinsi.required' => 'Provinsi wajib dipilih.',
            'ex_taiwan.required' => 'Ex taiwan wajib dipilih.',
            'jenis_paket.required' => 'Jenis paket wajib dipilih.',
            'paket_kerja.required' => 'Paket kerja wajib dipilih.',
            'glasses.required' => 'Glasses wajib dipilih.',
            'medical.required' => 'medical wajib dipilih.',
            'call_visa.required' => 'Call visa wajib dipilih.',
            'no_telpon.required' => 'Nomor telpon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'nama_kontak_darurat.required' => 'Nama kontak darurat wajib diisi.',
            'nomor_kontak_darurat.required' => 'Nomor kontak darurat wajib diisi.',
            'dokumen.pas_foto.required' => 'Pas foto wajib diupload.',
            'dokumen.pas_foto.mimes'    => 'Format pas foto harus JPEG/JPG/PNG.',
            'dokumen.pas_foto.max'      => 'Ukuran maksimal 2MB.',
        ]);
        // Cek validasi
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data migran berhasil ditambahkan!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
