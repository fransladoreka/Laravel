<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $fillable = [
        'datamigran_id',
        'jenis',
        'file_path'
    ];

    public function dataMigran()
    {
        return $this->belongsTo(DataMigran::class, 'datamigran_id');
    }
}
