<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketKerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'paketkerja',
        'tipe',
        'biayaakumulasi',
        'status'
    ];
}
