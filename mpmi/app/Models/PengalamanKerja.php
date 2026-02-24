<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengalamanKerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'datamigran_id',
        'negara',
        'posisi',
        'working_content',
        'mulai',
        'selesai',
        'alasan_keluar'
    ];
    public function dataMigran()
    {
        return $this->belongsTo(DataMigran::class, 'datamigran_id');
    }
}
