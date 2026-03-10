<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HakAkses extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('hakakses.index', compact('roles'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::unique('roles')
            ],
        ], [
            'name.required' => 'Nama role wajib diisi.',
            'name.min' => 'Nama akun minimal 2 karakter.',
            'kode.required' => 'Kode role wajib diisi.',
            'kode.unique' => 'Kode role sudah digunakan.',
        ]);

        // Cek validasi
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        DB::beginTransaction();
        try {
            $role = new Role();
            $role->kode = $request->kode;
            $role->name = $request->name;
            $role->description = !empty($request->description) ? $request->description : null;
            $role->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
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
        $role = Role::findById($id);
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::unique('roles')
            ],
        ], [
            'name.required' => 'Nama role wajib diisi.',
            'name.min' => 'Nama akun minimal 2 karakter.',
            'kode.required' => 'Kode role wajib diisi.',
            'kode.unique' => 'Kode role sudah digunakan.',
        ]);

        // Cek validasi
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        DB::beginTransaction();
        try {
            $role = Role::find($request->id);
            $role->kode = $request->kode;
            $role->name = $request->name;
            $role->description = !empty($request->description) ? $request->description : null;
            $role->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function permission($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $checked = $role->permissions
            ->pluck('id')
            ->toArray();
        $data = [];
        foreach ($permissions as $permission) {
            $data[] = [
                'id' => $permission->id,
                'parent' => $permission->parent_id ?? '#',
                'text' => $permission->display_name,
                'state' => [
                    'selected' => in_array($permission->id, $checked)
                ]
            ];
        }
        return response()->json($data);
    }
    public function simpanpermission(Request $request, $roleId)
    {
        DB::beginTransaction();
        try {
            $role = Role::findById($roleId);
            $permissions = Permission::whereIn('id', $request->permissions ?? [])->get();
            $role->syncPermissions($permissions);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Permission berhasil dimaping ke role!'
            ], 200);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
