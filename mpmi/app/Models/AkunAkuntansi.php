<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class AkunAkuntansi extends Model
{
    //
    use HasFactory;
    use HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'akun',
        'kode',
        'id_parent'
    ];
    public function children()
    {
        return $this->hasMany(AkunAkuntansi::class, 'id_parent')
            ->with('children');
    }
    public function parent()
    {
        return $this->belongsTo(AkunAkuntansi::class, 'id_parent');
    }
    public function deleteRecursive()
    {
        foreach ($this->children as $child) {
            $child->deleteRecursive();
        }
        $this->delete();
    }
}
