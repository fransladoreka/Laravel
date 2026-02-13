<?php

namespace App\Http\Controllers;

use App\Models\AkunAkuntansi;
use Illuminate\Http\Request;

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
    public function update(Request $request,string $id)
    {
        $akun = AkunAkuntansi::find($request->id);
        $akun->akun = $request->akun;
        $akun->kode = $request->kode;
        $akun->save();
        return response()->json(['success' => true]);
    }

    /**
     * Refresh folder
     */
    public function tree(string $id)
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
