<?php

namespace Database\Seeders;

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
        DB::table('akun_akuntansis')->insert(
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
                    'akun' => 'Kewajiban Lancat',
                    'kode' => 'B1',
                    'id_parent' => 2
                ],
                [
                    'akun' => 'Kewajiban Jangka Panjang',
                    'kode' => 'B2',
                    'id_parent' => 2
                ],
            ]
        );
    }
}
