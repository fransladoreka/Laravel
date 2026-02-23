<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datamigran extends Model
{
    public function pengalaman()
    {
        return $this->hasMany(PengalamanKerja::class);
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }
}
