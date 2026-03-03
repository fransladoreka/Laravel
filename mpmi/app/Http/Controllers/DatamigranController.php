<?php

namespace App\Http\Controllers;

use App\Models\Datamigran;
use App\Models\PaketKerja;
use App\Models\PengalamanKerja;
use App\Models\Dokumen;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Spatie\Browsershot\Browsershot;

class DatamigranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('datamigran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paketKerja = PaketKerja::all();
        //dd($paketKerja);
        return view('datamigran.create', compact('paketKerja'));
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
            'pendidikan' =>  'required',
            'tinggibadan' =>  'required',
            'beratbadan' =>  'required',
            'bahasa' => 'required|array|min:1',
            'nama_ayah' =>  'required',
            'nama_ibu' =>  'required',
            'status_pernikahan' =>  'required',
            'nama_partner' =>  'required',
            'son' =>  'required',
            'daughter' =>  'required',
            'dokumen.pas_foto' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pengalaman' => 'nullable|array',

            'pengalaman.*.negara' => 'nullable|required_with:pengalaman.*.posisi,pengalaman.*.working_content,pengalaman.*.tahun_awal,pengalaman.*.tahun_akhir,pengalaman.*.alasan_keluar',

            'pengalaman.*.posisi' => 'nullable|required_with:pengalaman.*.negara,pengalaman.*.working_content,pengalaman.*.tahun_awal,pengalaman.*.tahun_akhir,pengalaman.*.alasan_keluar',

            'pengalaman.*.working_content' => 'nullable|required_with:pengalaman.*.negara,pengalaman.*.posisi,pengalaman.*.tahun_awal,pengalaman.*.tahun_akhir,pengalaman.*.alasan_keluar',

            'pengalaman.*.tahun_awal' => 'nullable|required_with:pengalaman.*.negara,pengalaman.*.posisi,pengalaman.*.working_content,pengalaman.*.tahun_akhir,pengalaman.*.alasan_keluar',

            'pengalaman.*.tahun_akhir' => 'nullable|required_with:pengalaman.*.negara,pengalaman.*.posisi,pengalaman.*.working_content,pengalaman.*.tahun_awal,pengalaman.*.alasan_keluar',

            'pengalaman.*.alasan_keluar' => 'nullable|required_with:pengalaman.*.negara,pengalaman.*.posisi,pengalaman.*.working_content,pengalaman.*.tahun_awal,pengalaman.*.tahun_akhir',
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
            'pendidikan.required' =>  'Pendidikan wajib diisi',
            'tinggibadan.required' =>  'Tinggi badan wajib diisi',
            'beratbadan.required' =>  'Berat badan wajib diisi',
            'bahasa.required' => 'Bahasa wajib dipilih',
            'nama_ayah.required' =>  'Nama ayah wajib diisi',
            'nama_ibu.required' =>  'Nama ibu wajib diisi',
            'status_pernikahan.required' =>  'Status pernikahan wajib diisi',
            'nama_partner.required' =>  'Nama partner wajib diisi',
            'son.required' =>  'Jumlah anak laki-laki wajib diisi',
            'daughter.required' =>  'Jumlah anak perempuan wajib diisi',
            'dokumen.pas_foto.required' => 'Pas foto wajib diupload.',
            'dokumen.pas_foto.mimes'    => 'Format pas foto harus JPEG/JPG/PNG.',
            'dokumen.pas_foto.max'      => 'Ukuran maksimal 2MB.',
            'pengalaman.*.negara.required_with' => 'Semua field pengalaman kerja wajib diisi jika salah satu diisi.',
            'pengalaman.*.posisi.required_with' => 'Semua field pengalaman kerja wajib diisi jika salah satu diisi.',
            'pengalaman.*.working_content.required_with' => 'Semua field pengalaman kerja wajib diisi jika salah satu diisi.',
            'pengalaman.*.tahun_awal.required_with' => 'Semua field pengalaman kerja wajib diisi jika salah satu diisi.',
            'pengalaman.*.tahun_akhir.required_with' => 'Semua field pengalaman kerja wajib diisi jika salah satu diisi.',
            'pengalaman.*.alasan_keluar.required_with' => 'Semua field pengalaman kerja wajib diisi jika salah satu diisi.',
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

            $pelamar = Datamigran::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'no_passport' => $request['no_passport'] ?? null,
                'tgl_mulai_passport' => $request['tgl_mulai_passport'] ?? null,
                'tgl_berakhir_passport' => $request['tgl_berakhir_passport'] ?? null,
                'gender' => $request->gender,
                'tgl_lahir' => $request->tgl_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'agama' => $request->agama,
                'provinsi' => $request->provinsi,
                'ex_taiwan' => $request->ex_taiwan === 'true',
                'jenis_paket' => $request->jenis_paket,
                'paket_kerja' => $request->paket_kerja,
                'glasses' => $request->glasses === 'true',
                'medical' => $request->medical === 'true',
                'call_visa' => $request->call_visa === 'true',
                'no_telpon' => $request->no_telpon,
                'alamat' => $request->alamat,
                'nama_kontak_darurat' => $request->nama_kontak_darurat,
                'nomor_kontak_darurat' => $request->nomor_kontak_darurat,
                'pendidikan' => $request->pendidikan,
                'tinggibadan' => $request->tinggibadan,
                'beratbadan' => $request->beratbadan,
                'bahasa' => $request->bahasa,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'status_pernikahan' => $request->status_pernikahan,
                'nama_partner' => $request->nama_partner,
                'son' => $request->son,
                'daughter' => $request->daughter,
            ]);

            if ($request->pengalaman) {
                foreach ($request->pengalaman as $item) {
                    PengalamanKerja::create([
                        'datamigran_id' => $pelamar->id,
                        'negara' => $item['negara'] ?? null,
                        'posisi' => $item['posisi'] ?? null,
                        'working_content' => $item['working_content'] ?? null,
                        'mulai' => $item['mulai'] ?? null,
                        'selesai' => $item['selesai'] ?? null,
                        'alasan_keluar' => $item['alasan_keluar'] ?? null,
                    ]);
                }
            }

            if ($request->dokumen) {
                foreach ($request->dokumen as $jenis => $file) {
                    if ($file) {
                        $path = $file->store('dokumen', 'public');

                        Dokumen::create([
                            'datamigran_id' => $pelamar->id,
                            'jenis' => $jenis,
                            'file_path' => $path,
                        ]);
                    }
                }
            }

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
        $dataMigran = DataMigran::with([
            'dokumen',
            'pengalaman',
            'paketKerja'
        ])->findOrFail($id);

        //return response()->json($dataMigran);
        return view('datamigran.show', compact('dataMigran'));
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
    public function cetakPdf($id)
    {
        // //dd(file_exists(public_path('fonts/NotoSansTC-Regular.ttf')));
        $dataMigran = DataMigran::with(['dokumen', 'pengalaman'])->findOrFail($id);

        // $options = new Options();
        // $options->set('isRemoteEnabled', true);
        // $options->set('isHtml5ParserEnabled', true);

        // // Register font
        // $options->set('fontDir', storage_path('fonts'));
        // $options->set('fontCache', storage_path('fonts'));

        // $options->set('defaultFont', 'NotoSansTC');

        // $pdf = Pdf::loadView('datamigran.pdf', compact('dataMigran'));
        // $pdf->setOption('isRemoteEnabled', true);
        // $pdf->setOption('isHtml5ParserEnabled', true);
        // //$pdf->setOption('defaultFont', 'NotoCJK');

        // // Set kertas A4 Portrait
        // $pdf->setPaper('A4', 'portrait');

        // return $pdf->stream('datamigran_' . $dataMigran->id . '.pdf');
        $html = view('datamigran.pdf', compact('dataMigran'))->render();
        $pdf = Browsershot::html($html)
            ->format('A4')
            ->margins(12, 12, 12, 12)
            ->emulateMedia('screen')
            ->showBackground()
            ->pdf();

        return response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="datamigran_' . $id . '.pdf"',
        ]);
        // return response()->streamDownload(
        //     fn() => print(
        //         Browsershot::html($html)
        //         ->format('A4')
        //         ->margins(12, 12, 12, 12)
        //         ->showBackground()
        //         ->pdf()
        //     ),
        //     "datamigran_{$id}.pdf"
        // );
    }
}
