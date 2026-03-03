<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Datamigran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'no_passport',
        'tgl_mulai_passport',
        'tgl_berakhir_passport',
        'gender',
        'tgl_lahir',
        'tempat_lahir',
        'agama',
        'provinsi',
        'ex_taiwan',
        'jenis_paket',
        'paket_kerja',
        'glasses',
        'medical',
        'call_visa',
        'no_telpon',
        'alamat',
        'nama_kontak_darurat',
        'nomor_kontak_darurat',
        'pendidikan',
        'tinggibadan',
        'beratbadan',
        'bahasa',
        'nama_ayah',
        'nama_ibu',
        'status_pernikahan',
        'nama_partner',
        'son',
        'daughter'
    ];
    protected $casts = [
        'bahasa' => 'array',
    ];
    public function pengalaman()
    {
        return $this->hasMany(PengalamanKerja::class, 'datamigran_id');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'datamigran_id');
    }
    public function paketKerja()
    {
        return $this->belongsTo(PaketKerja::class, 'paket_kerja');
    }
}
