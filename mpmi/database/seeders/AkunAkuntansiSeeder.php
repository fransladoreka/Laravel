<?php

namespace Database\Seeders;

use App\Models\AkunAkuntansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunAkuntansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*DB::table('akun_akuntansis')->insert(
            [
                [
                    'akun' => 'Aset',
                    'kode' => 'A1',
                    'id_parent' => null
                ],
                [
                    'akun' => 'Kewajiban',
                    'kode' => 'A2',
                    'id_parent' => null
                ],
                [
                    'akun' => 'Ekuitas',
                    'kode' => 'A3',
                    'id_parent' => null
                ],
                [
                    'akun' => 'Pendapatan',
                    'kode' => 'A4',
                    'id_parent' => null
                ],
                [
                    'akun' => 'Beban',
                    'kode' => 'A5',
                    'id_parent' => null
                ],
                [
                    'akun' => 'Kewajiban Lancar',
                    'kode' => 'B1',
                    'id_parent' => 2
                ],
                [
                    'akun' => 'Kewajiban Jangka Panjang',
                    'kode' => 'B2',
                    'id_parent' => 2
                ],
            ]
        );*/
        $Aset = AkunAkuntansi::create([
            'akun' => 'Aset',
            'kode' => 'A1',
            'id_parent' => null
        ]);
        $Kewajiban = AkunAkuntansi::create([
            'akun' => 'Kewajiban',
            'kode' => 'A2',
            'id_parent' => null
        ]);
        $Ekuitas = AkunAkuntansi::create([
            'akun' => 'Ekuitas',
            'kode' => 'A3',
            'id_parent' => null
        ]);
        $Pendapatan = AkunAkuntansi::create([
            'akun' => 'Pendapatan',
            'kode' => 'A4',
            'id_parent' => null
        ]);
        $Beban = AkunAkuntansi::create([
            'akun' => 'Beban',
            'kode' => 'A5',
            'id_parent' => null
        ]);
        $Kewajiban1 = AkunAkuntansi::create([
            'akun' => 'Kewajiban Lancar',
            'kode' => 'B1',
            'id_parent' => $Kewajiban->id
        ]);
        $Kewajiban2 = AkunAkuntansi::create([
            'akun' => 'Kewajiban Jangka Panjang',
            'kode' => 'B2',
            'id_parent' => $Kewajiban->id
        ]);
    }
}
