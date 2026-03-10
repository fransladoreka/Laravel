<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Dokumen extends Model
{
    use HasFactory;
    use HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';
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
