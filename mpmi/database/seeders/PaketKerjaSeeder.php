<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaketKerja;

class PaketKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PaketKerja::create([
            "kode" => "CV",
            "paketkerja" => "-",
            "tipe" => "Formal",
            "biayaakumulasi" => 0.0,
            "biodata" => "-",
            "status" => 1
        ]);
        PaketKerja::create([
            "kode" => "FR",
            "paketkerja" => "Farming",
            "tipe" => "Formal",
            "biayaakumulasi" => 35000000.0,
            "biodata" => "FARMING WORKER \u8fb2\u696d\u52de\u5de5",
            "status" => 1
        ]);
        PaketKerja::create([
            "kode" => "IF",
            "paketkerja" => "Perawat",
            "tipe" => "Informal",
            "biayaakumulasi" => 3262200.0,
            "biodata" => "CARETAKER \u770b\u8b77\u5de5",
            "status" => 1
        ]);
        PaketKerja::create([
            "kode" => "NL",
            "paketkerja" => "Nelayan",
            "tipe" => "Formal",
            "biayaakumulasi" => 40000.0,
            "biodata" => "FISHERMAN\u6f01\u5de5",
            "status" => 1
        ]);
        PaketKerja::create([
            "kode" => "PJ",
            "paketkerja" => "Panti Jompo",
            "tipe" => "Formal",
            "biayaakumulasi" => 55000000.0,
            "biodata" => "NURSING HOME \u6a5f\u69cb\u5de5",
            "status" => 1
        ]);
        PaketKerja::create([
            "kode" => "PK",
            "paketkerja" => "Kontruksi",
            "tipe" => "Formal",
            "biayaakumulasi" => 72000000.0,
            "biodata" => "CONSTRUCTION WORKER \u71df\u9020\u5de5",
            "status" => 1
        ]);
        PaketKerja::create([
            "kode" => "PL",
            "paketkerja" => "Pabrik",
            "tipe" => "Formal",
            "biayaakumulasi" => 80000000.0,
            "biodata" => "MANUFACTURE \u5de5\u5ee0\u5de5",
            "status" => 1
        ]);
        PaketKerja::create([
            "kode" => "PP",
            "paketkerja" => "Pabrik",
            "tipe" => "Formal",
            "biayaakumulasi" => 77000000.0,
            "biodata" => "MANUFACTURE \u5de5\u5ee0\u5de5",
            "status" => 1
        ]);
    }
}
