<?php

namespace App\Http\Controllers;

use App\Models\AkunAkuntansi;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AkunAkuntansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = AkunAkuntansi::whereNull('id_parent')
            ->with('children')
            ->get();
        return view('akun.index', compact('akun'));
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
        $akun = new AkunAkuntansi();
        $akun->akun = $request->akun;
        $akun->kode = $request->kode;
        $akun->id_parent = $request->id_parent;
        $akun->save();
        return response()->json(['success' => true]);
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
    // public function update(Request $request, string $id)
    public function update(Request $request, string $id)
    {
        // $validated = $request->validate([
        //     'id' => 'required|exists:akun_akuntansis,id',
        //     'akun' => 'required|string|min:3|max:100',
        //     'kode' => [
        //         'required',
        //         'string',
        //         'max:20',
        //         Rule::unique('akun_akuntansis')->ignore($request->id)
        //     ],
        // ], [
        //     'akun.required' => 'Nama akun wajib diisi.',
        //     'akun.min' => 'Nama akun minimal 3 karakter.',
        //     'kode.required' => 'Kode akun wajib diisi.',
        //     'kode.unique' => 'Kode akun sudah digunakan.',
        // ]);
        // Buat validator manual
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:akun_akuntansis,id',
            'akun' => 'required|string|min:3|max:100',
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::unique('akun_akuntansis')->ignore($request->id)
            ],
        ], [
            'akun.required' => 'Nama akun wajib diisi.',
            'akun.min' => 'Nama akun minimal 3 karakter.',
            'kode.required' => 'Kode akun wajib diisi.',
            'kode.unique' => 'Kode akun sudah digunakan.',
        ]);

        // Cek validasi
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $akun = AkunAkuntansi::find($request->id);
        $akun->akun = $request->akun;
        $akun->kode = $request->kode;
        $akun->save();
        return response()->json(['success' => true]);
    }

    /**
     * Refresh folder
     */
    public function tree()
    {
        $akun = AkunAkuntansi::whereNull('id_parent')
            ->with('children')
            ->get();
        return view('akun.partials.tree', compact('akun'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
