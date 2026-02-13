<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunAkuntansi extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'akun',
        'kode',
        'id_parent'
    ];
    public function children()
    {
        return $this->hasMany(AkunAkuntansi::class,'id_parent');
    }
    public function parent()
    {
        return $this->belongsTo(AkunAkuntansi::class,'id_parent');
    }
}
