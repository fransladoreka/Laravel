<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use app\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat izin
        $dashboard = Permission::create([
            'name' => 'dashboard',          // leaf permission kalau mau
            'display_name' => 'Dashboard',
            'parent_id' => null
        ]);
        $dashboard_read = Permission::create([
            'name' => 'dashboard.read',          // leaf permission kalau mau
            'display_name' => 'Dashboard Read',
            'parent_id' => $dashboard->id
        ]);
        $master = Permission::create([
            'name' => 'master',          // leaf permission kalau mau
            'display_name' => 'Master',
            'parent_id' => null
        ]);
        $master_bank = Permission::create([
            'name' => 'master.bank',          // leaf permission kalau mau
            'display_name' => 'Bank',
            'parent_id' => $master->id
        ]);
        $master_bank_read = Permission::create([
            'name' => 'master.bank.read',          // leaf permission kalau mau
            'display_name' => 'Bank Read',
            'parent_id' => $master_bank->id
        ]);
        $master_bank_create = Permission::create([
            'name' => 'master.bank.create',          // leaf permission kalau mau
            'display_name' => 'Bank Create',
            'parent_id' => $master_bank->id
        ]);
        $master_bank_update = Permission::create([
            'name' => 'master.bank.update',          // leaf permission kalau mau
            'display_name' => 'Bank Update',
            'parent_id' => $master_bank->id
        ]);
        $master_bank_delete = Permission::create([
            'name' => 'master.bank.delete',          // leaf permission kalau mau
            'display_name' => 'Bank Delete',
            'parent_id' => $master_bank->id
        ]);
        $master_taiwan_representative = Permission::create([
            'name' => 'master.taiwanrepresentative',          // leaf permission kalau mau
            'display_name' => 'Taiwan Representative',
            'parent_id' => $master->id
        ]);
        $master_taiwanrepresentative_read = Permission::create([
            'name' => 'master.taiwanrepresentative.read',          // leaf permission kalau mau
            'display_name' => 'Top Agen Read',
            'parent_id' => $master_taiwan_representative->id
        ]);
        $master_taiwanrepresentative_create = Permission::create([
            'name' => 'master.taiwanrepresentative.create',          // leaf permission kalau mau
            'display_name' => 'Top Agen Create',
            'parent_id' => $master_taiwan_representative->id
        ]);
        $master_taiwanrepresentative_update = Permission::create([
            'name' => 'master.taiwanrepresentative.update',          // leaf permission kalau mau
            'display_name' => 'Top Agen Update',
            'parent_id' => $master_taiwan_representative->id
        ]);
        $master_taiwanrepresentative_delete = Permission::create([
            'name' => 'master.taiwanrepresentative.delete',          // leaf permission kalau mau
            'display_name' => 'Top Agen Delete',
            'parent_id' => $master_taiwan_representative->id
        ]);
        $master_field_agen = Permission::create([
            'name' => 'master.fieldagen',          // leaf permission kalau mau
            'display_name' => 'Field Agen',
            'parent_id' => $master->id
        ]);
        $master_field_agen_read = Permission::create([
            'name' => 'master.fieldagen.read',          // leaf permission kalau mau
            'display_name' => 'Field Agen Read',
            'parent_id' => $master_field_agen->id
        ]);
        $master_field_agen_create = Permission::create([
            'name' => 'master.fieldagen.create',          // leaf permission kalau mau
            'display_name' => 'Field Agen Create',
            'parent_id' => $master_field_agen->id
        ]);
        $master_field_agen_update = Permission::create([
            'name' => 'master.fieldagen.update',          // leaf permission kalau mau
            'display_name' => 'Field Agen Update',
            'parent_id' => $master_field_agen->id
        ]);
        $master_field_agen_delete = Permission::create([
            'name' => 'master.fieldagen.delete',          // leaf permission kalau mau
            'display_name' => 'Field Agen Delete',
            'parent_id' => $master_field_agen->id
        ]);
        $master_biaya_paket_kerja = Permission::create([
            'name' => 'master.biayapaketkerja',          // leaf permission kalau mau
            'display_name' => 'Biaya Paket Kerja',
            'parent_id' => $master->id
        ]);
        $master_biaya_paket_kerja_read = Permission::create([
            'name' => 'master.biayapaketkerja.read',          // leaf permission kalau mau
            'display_name' => 'Biaya Paket Kerja Read',
            'parent_id' => $master_biaya_paket_kerja->id
        ]);
        $master_biaya_paket_kerja_create = Permission::create([
            'name' => 'master.biayapaketkerja.create',          // leaf permission kalau mau
            'display_name' => 'Biaya Paket Kerja Create',
            'parent_id' => $master_biaya_paket_kerja->id
        ]);
        $master_biaya_paket_kerja_update = Permission::create([
            'name' => 'master.biayapaketkerja.update',          // leaf permission kalau mau
            'display_name' => 'Biaya Paket Kerja Update',
            'parent_id' => $master_biaya_paket_kerja->id
        ]);
        $master_biaya_paket_kerja_delete = Permission::create([
            'name' => 'master.biayapaketkerja.delete',          // leaf permission kalau mau
            'display_name' => 'Biaya Paket Kerja Delete',
            'parent_id' => $master_biaya_paket_kerja->id
        ]);
        $akun = Permission::create([
            'name' => 'master.akun',          // leaf permission kalau mau
            'display_name' => 'Akun',
            'parent_id' => $master->id
        ]);
        $akun_read = Permission::create([
            'name' => 'master.akun.read',          // leaf permission kalau mau
            'display_name' => 'Akun Read',
            'parent_id' => $akun->id
        ]);
        $akun_create = Permission::create([
            'name' => 'master.akun.create',          // leaf permission kalau mau
            'display_name' => 'Akun Create',
            'parent_id' => $akun->id
        ]);
        $akun_update = Permission::create([
            'name' => 'master.akun.update',          // leaf permission kalau mau
            'display_name' => 'Akun Update',
            'parent_id' => $akun->id
        ]);
        $akun_delete = Permission::create([
            'name' => 'master.akun.delete',          // leaf permission kalau mau
            'display_name' => 'Akun Delete',
            'parent_id' => $akun->id
        ]);
        $master_perekrut_lapangan = Permission::create([
            'name' => 'master.perekrutlapangan',          // leaf permission kalau mau
            'display_name' => 'Perekrut Lapangan',
            'parent_id' => $master->id
        ]);
        $master_perekrut_lapangan_read = Permission::create([
            'name' => 'master.perekrutlapangan.read',          // leaf permission kalau mau
            'display_name' => 'Perekrut Lapangan Read',
            'parent_id' =>  $master_perekrut_lapangan->id
        ]);
        $master_perekrut_lapangan_create = Permission::create([
            'name' => 'master.perekrutlapangan.create',          // leaf permission kalau mau
            'display_name' => 'Perekrut Lapangan Create',
            'parent_id' =>  $master_perekrut_lapangan->id
        ]);
        $master_perekrut_lapangan_update = Permission::create([
            'name' => 'master.perekrutlapangan.update',          // leaf permission kalau mau
            'display_name' => 'Perekrut Lapangan Update',
            'parent_id' =>  $master_perekrut_lapangan->id
        ]);
        $master_perekrut_lapangan_delete = Permission::create([
            'name' => 'master.perekrutlapangan.delete',          // leaf permission kalau mau
            'display_name' => 'Perekrut Lapangan Delete',
            'parent_id' =>  $master_perekrut_lapangan->id
        ]);
        $master_requirement_job = Permission::create([
            'name' => 'master.requirementjob',          // leaf permission kalau mau
            'display_name' => 'Requirement Job',
            'parent_id' => $master->id
        ]);
        $master_requirement_job_read = Permission::create([
            'name' => 'master.requirementjob.read',          // leaf permission kalau mau
            'display_name' => 'Requirement Job Read',
            'parent_id' =>   $master_requirement_job->id
        ]);
        $master_requirement_job_create = Permission::create([
            'name' => 'master.requirementjob.create',          // leaf permission kalau mau
            'display_name' => 'Requirement Job Create',
            'parent_id' =>   $master_requirement_job->id
        ]);
        $master_requirement_job_update = Permission::create([
            'name' => 'master.requirementjob.update',          // leaf permission kalau mau
            'display_name' => 'Requirement Job Update',
            'parent_id' =>   $master_requirement_job->id
        ]);
        $master_requirement_job_delete = Permission::create([
            'name' => 'master.requirementjob.delete',          // leaf permission kalau mau
            'display_name' => 'Requirement Job Delete',
            'parent_id' =>   $master_requirement_job->id
        ]);
        $master_standar_pengeluaran = Permission::create([
            'name' => 'master.standarpengeluaran',          // leaf permission kalau mau
            'display_name' => 'Standar Pengeluaran',
            'parent_id' => $master->id
        ]);
        $master_standar_pengeluaran_read = Permission::create([
            'name' => 'master.standarpengeluaran.read',          // leaf permission kalau mau
            'display_name' => 'Standar Pengeluaran Read',
            'parent_id' =>   $master_standar_pengeluaran->id
        ]);
        $master_standar_pengeluaran_create = Permission::create([
            'name' => 'master.standarpengeluaran.create',          // leaf permission kalau mau
            'display_name' => 'Standar Pengeluaran Create',
            'parent_id' =>   $master_standar_pengeluaran->id
        ]);
        $master_standar_pengeluaran_update = Permission::create([
            'name' => 'master.standarpengeluaran.update',          // leaf permission kalau mau
            'display_name' => 'Standar Pengeluaran Update',
            'parent_id' =>   $master_standar_pengeluaran->id
        ]);
        $master_standar_pengeluaran_delete = Permission::create([
            'name' => 'master.standarpengeluaran.delete',          // leaf permission kalau mau
            'display_name' => 'Standar Pengeluaran Delete',
            'parent_id' =>   $master_standar_pengeluaran->id
        ]);
        $master_pembuatan_berkas = Permission::create([
            'name' => 'master.pembuatanberkas',          // leaf permission kalau mau
            'display_name' => 'Pembuatan Berkas',
            'parent_id' => $master->id
        ]);
        $master_pembuatan_berkas_read = Permission::create([
            'name' => 'master.pembuatanberkas.read',          // leaf permission kalau mau
            'display_name' => 'Pembuatan Berkas Read',
            'parent_id' =>   $master_pembuatan_berkas->id
        ]);
        $master_pembuatan_berkas_create = Permission::create([
            'name' => 'master.pembuatanberkas.create',          // leaf permission kalau mau
            'display_name' => 'Pembuatan Berkas Create',
            'parent_id' =>   $master_pembuatan_berkas->id
        ]);
        $master_pembuatan_berkas_update = Permission::create([
            'name' => 'master.pembuatanberkas.update',          // leaf permission kalau mau
            'display_name' => 'Pembuatan Berkas Update',
            'parent_id' => $master_pembuatan_berkas->id
        ]);
        $master_pembuatan_berkas_delete = Permission::create([
            'name' => 'master.pembuatanberkas.delete',          // leaf permission kalau mau
            'display_name' => 'Pembuatan Berkas Delete',
            'parent_id' =>   $master_pembuatan_berkas->id
        ]);
        $tw1 = Permission::create([
            'name' => 'taiwanrepresentative',          // leaf permission kalau mau
            'display_name' => 'Taiwan Representative',
            'parent_id' => null
        ]);
        $tw12 = Permission::create([
            'name' => 'taiwanrepresentative.read',          // leaf permission kalau mau
            'display_name' => 'Top Agen Read',
            'parent_id' => $tw1->id
        ]);
        $mdm = Permission::create([
            'name' => 'manajemendatamigran',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data Migran',
            'parent_id' => null
        ]);
        $mdmtac = Permission::create([
            'name' => 'manajemendatamigran.topagen.create',          // leaf permission kalau mau
            'display_name' => 'Top Agen Create',
            'parent_id' => $mdm->id
        ]);
        $mdmtau = Permission::create([
            'name' => 'manajemendatamigran.topagen.update',          // leaf permission kalau mau
            'display_name' => 'Top Agen Update',
            'parent_id' => $mdm->id
        ]);
        $mdmtad = Permission::create([
            'name' => 'manajemendatamigran.topagen.delete',          // leaf permission kalau mau
            'display_name' => 'Top Agen Delete',
            'parent_id' => $mdm->id
        ]);
        $mdmtav = Permission::create([
            'name' => 'manajemendatamigran.topagen.view',          // leaf permission kalau mau
            'display_name' => 'Top Agen View',
            'parent_id' => $mdm->id
        ]);
        $mdmr = Permission::create([
            'name' => 'manajemendatamigran.read',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data Migran Read',
            'parent_id' => $mdm->id
        ]);
        $mdmc = Permission::create([
            'name' => 'manajemendatamigran.create',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data Migran Create',
            'parent_id' => $mdm->id
        ]);
        $mdmu = Permission::create([
            'name' => 'manajemendatamigran.update',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data Migran Update',
            'parent_id' => $mdm->id
        ]);
        $mdmd = Permission::create([
            'name' => 'manajemendatamigran.delete',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data Migran Delete',
            'parent_id' => $mdm->id
        ]);
        $mdmv = Permission::create([
            'name' => 'manajemendatamigran.view',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data Migran View',
            'parent_id' => $mdm->id
        ]);
        $scpmi = Permission::create([
            'name' => 'sharecpmi',          // leaf permission kalau mau
            'display_name' => 'Share CPMI',
            'parent_id' => null
        ]);
        $scpmir = Permission::create([
            'name' => 'sharecpmi.read',          // leaf permission kalau mau
            'display_name' => 'Share CPMI Read',
            'parent_id' => $scpmi->id
        ]);
        $scpmic = Permission::create([
            'name' => 'sharecpmi.create',          // leaf permission kalau mau
            'display_name' => 'Share CPMI Create',
            'parent_id' => $scpmi->id
        ]);
        $scpmiu = Permission::create([
            'name' => 'sharecpmi.update',          // leaf permission kalau mau
            'display_name' => 'Share CPMI Update',
            'parent_id' => $scpmi->id
        ]);
        $scpmid = Permission::create([
            'name' => 'sharecpmi.delete',          // leaf permission kalau mau
            'display_name' => 'Share CPMI Delete',
            'parent_id' => $scpmi->id
        ]);
        $mdu = Permission::create([
            'name' => 'manajemendatauser',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data User',
            'parent_id' => null
        ]);
        $mdur = Permission::create([
            'name' => 'manajemendatauser.read',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data User Read',
            'parent_id' => $mdu->id
        ]);
        $mduc = Permission::create([
            'name' => 'manajemendatauser.create',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data User Create',
            'parent_id' => $mdu->id
        ]);
        $mduu = Permission::create([
            'name' => 'manajemendatauser.update',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data User Update',
            'parent_id' => $mdu->id
        ]);
        $mdud = Permission::create([
            'name' => 'manajemendatauser.delete',          // leaf permission kalau mau
            'display_name' => 'Manajemen Data User Delete',
            'parent_id' => $mdu->id
        ]);
        $tw2 = Permission::create([
            'name' => 'taiwan.representative',          // leaf permission kalau mau
            'display_name' => 'Taiwan Representative',
            'parent_id' => null
        ]);
        $pmir = Permission::create([
            'name' => 'pmi.read',          // leaf permission kalau mau
            'display_name' => 'Pmi Read',
            'parent_id' => $tw2->id
        ]);
        $pmic = Permission::create([
            'name' => 'pmi.create',          // leaf permission kalau mau
            'display_name' => 'Pmi Create',
            'parent_id' => $tw2->id
        ]);
        $pmiu = Permission::create([
            'name' => 'pmi.update',          // leaf permission kalau mau
            'display_name' => 'Pmi Update',
            'parent_id' => $tw2->id
        ]);
        $pmid = Permission::create([
            'name' => 'pmi.delete',          // leaf permission kalau mau
            'display_name' => 'Pmi Delete',
            'parent_id' => $tw2->id
        ]);
        $pmiv = Permission::create([
            'name' => 'pmi.view',          // leaf permission kalau mau
            'display_name' => 'Pmi View',
            'parent_id' => $tw2->id
        ]);
        $tw3 = Permission::create([
            'name' => 'manajemenaccounting',          // leaf permission kalau mau
            'display_name' => 'Manajemen Accounting',
            'parent_id' => null
        ]);
        $transaksi = Permission::create([
            'name' => 'transaksi',          // leaf permission kalau mau
            'display_name' => 'Transaksi',
            'parent_id' => null
        ]);
        $transaksi_kas = Permission::create([
            'name' => 'transaksi.kas',          // leaf permission kalau mau
            'display_name' => 'Kas',
            'parent_id' => $transaksi->id
        ]);
        $transaksi_kas_read = Permission::create([
            'name' => 'transaksi.kas.read',          // leaf permission kalau mau
            'display_name' => 'Kas Read',
            'parent_id' => $transaksi_kas->id
        ]);
        $transaksi_ju = Permission::create([
            'name' => 'transaksi.jurnalumum',          // leaf permission kalau mau
            'display_name' => 'Jurnal Umum',
            'parent_id' => $transaksi->id
        ]);
        $transaksi_ju_read = Permission::create([
            'name' => 'transaksi.jurnalumum.read',          // leaf permission kalau mau
            'display_name' => 'Jurnal Umum Read',
            'parent_id' => $transaksi_ju->id
        ]);
        $transaksi_jb = Permission::create([
            'name' => 'transaksi.jurnalberkas',          // leaf permission kalau mau
            'display_name' => 'Jurnal Berkas',
            'parent_id' => $transaksi->id
        ]);
        $transaksi_jb_read = Permission::create([
            'name' => 'transaksi.jurnalberkas.read',          // leaf permission kalau mau
            'display_name' => 'Jurnal Berkas Read',
            'parent_id' => $transaksi_jb->id
        ]);
        $transaksi_tb = Permission::create([
            'name' => 'transaksi.tutupbuku',          // leaf permission kalau mau
            'display_name' => 'Tutup Buku',
            'parent_id' => $transaksi->id
        ]);
        $transaksi_tb_create = Permission::create([
            'name' => 'transaksi.tutupbuku.create',          // leaf permission kalau mau
            'display_name' => 'Tutup Buku Create',
            'parent_id' => $transaksi_tb->id
        ]);
        $laporan = Permission::create([
            'name' => 'laporan',          // leaf permission kalau mau
            'display_name' => 'Laporan',
            'parent_id' => null
        ]);
        $laporan_cicilan = Permission::create([
            'name' => 'laporan.cicilan',          // leaf permission kalau mau
            'display_name' => 'Laporan Cicilan',
            'parent_id' =>  $laporan->id
        ]);
        $laporan_cicilan_read = Permission::create([
            'name' => 'laporan.cicilan.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Read',
            'parent_id' =>  $laporan_cicilan->id
        ]);
        $laporan_cicilan_create = Permission::create([
            'name' => 'laporan.cicilan.create',          // leaf permission kalau mau
            'display_name' => 'Laporan Create',
            'parent_id' =>  $laporan_cicilan->id
        ]);
        $laporan_rekap_pmi = Permission::create([
            'name' => 'laporan.rekappmi',          // leaf permission kalau mau
            'display_name' => 'Laporan Rekap Pmi',
            'parent_id' =>  $laporan->id
        ]);
        $laporan_rekap_pmi_read = Permission::create([
            'name' => 'laporan.rekappmi.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Rekap Pmi Read',
            'parent_id' =>  $laporan_rekap_pmi->id
        ]);
        $laporan_rekap_pmi_create = Permission::create([
            'name' => 'laporan.rekappmi.create',          // leaf permission kalau mau
            'display_name' => 'Laporan Rekap Pmi Create',
            'parent_id' =>  $laporan_rekap_pmi->id
        ]);
        $laporan_flight_pmi = Permission::create([
            'name' => 'laporan.flightpmi',          // leaf permission kalau mau
            'display_name' => 'Laporan Flight Pmi',
            'parent_id' =>  $laporan->id
        ]);
        $laporan_flight_pmi_read = Permission::create([
            'name' => 'laporan.flightpmi.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Flight Pmi Read',
            'parent_id' =>  $laporan_flight_pmi->id
        ]);
        $laporan_flight_pmi_create = Permission::create([
            'name' => 'laporan.flightpmi.create',          // leaf permission kalau mau
            'display_name' => 'Laporan Flight Pmi Create',
            'parent_id' =>  $laporan_flight_pmi->id
        ]);
        $laporan_akuntansi = Permission::create([
            'name' => 'laporanakuntansi',          // leaf permission kalau mau
            'display_name' => 'Laporan Akuntansi',
            'parent_id' => null
        ]);
        $laporan_akuntansi_neraca = Permission::create([
            'name' => 'laporanakuntansi.neraca',          // leaf permission kalau mau
            'display_name' => 'Laporan Neraca',
            'parent_id' => $laporan_akuntansi->id
        ]);
        $laporan_akuntansi_neraca_read = Permission::create([
            'name' => 'laporanakuntansi.neraca.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Neraca Read',
            'parent_id' => $laporan_akuntansi_neraca->id
        ]);
        $laporan_akuntansi_neraca_create = Permission::create([
            'name' => 'laporanakuntansi.neraca.create',          // leaf permission kalau mau
            'display_name' => 'Laporan Neraca Create',
            'parent_id' => $laporan_akuntansi_neraca->id
        ]);
        $laporan_akuntansi_neraca_update = Permission::create([
            'name' => 'laporanakuntansi.neraca.update',          // leaf permission kalau mau
            'display_name' => 'Laporan Neraca Update',
            'parent_id' => $laporan_akuntansi_neraca->id
        ]);
        $laporan_akuntansi_neraca_delete = Permission::create([
            'name' => 'laporanakuntansi.neraca.delete',          // leaf permission kalau mau
            'display_name' => 'Laporan Neraca Delete',
            'parent_id' => $laporan_akuntansi_neraca->id
        ]);
        $laporan_akuntansi_jurnal = Permission::create([
            'name' => 'laporanakuntansi.jurnal',          // leaf permission kalau mau
            'display_name' => 'Laporan Jurnal',
            'parent_id' => $laporan_akuntansi->id
        ]);
        $laporan_akuntansi_jurnal_read = Permission::create([
            'name' => 'laporanakuntansi.jurnal.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Jurnal Read',
            'parent_id' => $laporan_akuntansi_jurnal->id
        ]);
        $laporan_akuntansi_jurnal_create = Permission::create([
            'name' => 'laporanakuntansi.jurnal.create',          // leaf permission kalau mau
            'display_name' => 'Laporan Jurnal Create',
            'parent_id' => $laporan_akuntansi_jurnal->id
        ]);
        $laporan_akuntansi_jurnal_update = Permission::create([
            'name' => 'laporanakuntansi.jurnal.update',          // leaf permission kalau mau
            'display_name' => 'Laporan Jurnal Update',
            'parent_id' => $laporan_akuntansi_jurnal->id
        ]);
        $laporan_akuntansi_jurnal_delete = Permission::create([
            'name' => 'laporanakuntansi.jurnal.delete',          // leaf permission kalau mau
            'display_name' => 'Laporan Jurnal Delete',
            'parent_id' => $laporan_akuntansi_jurnal->id
        ]);
        $laporan_akuntansi_labarugi = Permission::create([
            'name' => 'laporanakuntansi.labarugi',          // leaf permission kalau mau
            'display_name' => 'Laporan Laba Rugi',
            'parent_id' => $laporan_akuntansi->id
        ]);
        $laporan_akuntansi_labarugi_read = Permission::create([
            'name' => 'laporanakuntansi.labarugi.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Laba Rugi Read',
            'parent_id' => $laporan_akuntansi_labarugi->id
        ]);
        $laporan_akuntansi_labarugi_create = Permission::create([
            'name' => 'laporanakuntansi.labarugi.create',          // leaf permission kalau mau
            'display_name' => 'Laporan Laba Rugi Create',
            'parent_id' => $laporan_akuntansi_labarugi->id
        ]);
        $laporan_akuntansi_labarugi_update = Permission::create([
            'name' => 'laporanakuntansi.labarugi.update',          // leaf permission kalau mau
            'display_name' => 'Laporan Laba Rugi Update',
            'parent_id' => $laporan_akuntansi_labarugi->id
        ]);
        $laporan_akuntansi_labarugi_delete = Permission::create([
            'name' => 'laporanakuntansi.labarugi.delete',          // leaf permission kalau mau
            'display_name' => 'Laporan Laba Rugi Delete',
            'parent_id' => $laporan_akuntansi_labarugi->id
        ]);
        $laporan_akuntansi_bukubesar = Permission::create([
            'name' => 'laporanakuntansi.bukubesar',          // leaf permission kalau mau
            'display_name' => 'Laporan Buku Besar',
            'parent_id' => $laporan_akuntansi->id
        ]);
        $laporan_akuntansi_bukubesar_read = Permission::create([
            'name' => 'laporanakuntansi.bukubesar.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Buku Besar Read',
            'parent_id' => $laporan_akuntansi_bukubesar->id
        ]);
        $laporan_akuntansi_perubahanmodal = Permission::create([
            'name' => 'laporanakuntansi.perubahanmodal',          // leaf permission kalau mau
            'display_name' => 'Laporan Perubahan Modal',
            'parent_id' => $laporan_akuntansi->id
        ]);
        $laporan_akuntansi_perubahanmodal_read = Permission::create([
            'name' => 'laporanakuntansi.perubahanmodal.read',          // leaf permission kalau mau
            'display_name' => 'Laporan Perubahan Modal Read',
            'parent_id' => $laporan_akuntansi_perubahanmodal->id
        ]);
        $pengaturan = Permission::create([
            'name' => 'pengaturan',          // leaf permission kalau mau
            'display_name' => 'Pengaturan',
            'parent_id' => null
        ]);
        $pengaturan_aplikasi = Permission::create([
            'name' => 'pengaturan.aplikasi',          // leaf permission kalau mau
            'display_name' => 'Konfigurasi Aplikasi',
            'parent_id' => $pengaturan->id
        ]);
        $pengaturan_aplikasi_read = Permission::create([
            'name' => 'pengaturan.aplikasi.read',          // leaf permission kalau mau
            'display_name' => 'App Configuration Read',
            'parent_id' => $pengaturan_aplikasi->id
        ]);
        $pengaturan_aplikasi_create = Permission::create([
            'name' => 'pengaturan.aplikasi.create',          // leaf permission kalau mau
            'display_name' => 'App Configuration Create',
            'parent_id' => $pengaturan_aplikasi->id
        ]);
        $pengaturan_aplikasi_update = Permission::create([
            'name' => 'pengaturan.aplikasi.update',          // leaf permission kalau mau
            'display_name' => 'App Configuration Update',
            'parent_id' => $pengaturan_aplikasi->id
        ]);
        $pengaturan_aplikasi_delete = Permission::create([
            'name' => 'pengaturan.aplikasi.delete',          // leaf permission kalau mau
            'display_name' => 'App Configuration Delete',
            'parent_id' => $pengaturan_aplikasi->id
        ]);
        $pengaturan_role = Permission::create([
            'name' => 'pengaturan.role',          // leaf permission kalau mau
            'display_name' => 'Hak Akses',
            'parent_id' => $pengaturan->id
        ]);
        $pengaturan_role_read = Permission::create([
            'name' => 'pengaturan.role.read',          // leaf permission kalau mau
            'display_name' => 'Permission Management Read',
            'parent_id' => $pengaturan_role->id
        ]);
        $pengaturan_role_create = Permission::create([
            'name' => 'pengaturan.role.create',          // leaf permission kalau mau
            'display_name' => 'Permission Management Create',
            'parent_id' => $pengaturan_role->id
        ]);
        $pengaturan_role_update = Permission::create([
            'name' => 'pengaturan.role.update',          // leaf permission kalau mau
            'display_name' => 'Permission Management Update',
            'parent_id' => $pengaturan_role->id
        ]);
        $pengaturan_role_delete = Permission::create([
            'name' => 'pengaturan.role.delete',          // leaf permission kalau mau
            'display_name' => 'Permission Management Delete',
            'parent_id' => $pengaturan_role->id
        ]);
        $pengaturan_role_akses = Permission::create([
            'name' => 'pengaturan.role.akses',          // leaf permission kalau mau
            'display_name' => 'Permission Management Access',
            'parent_id' => $pengaturan_role->id
        ]);
        $pengaturan_role_back = Permission::create([
            'name' => 'pengaturan.role.back',          // leaf permission kalau mau
            'display_name' => 'Permission Management Back',
            'parent_id' => $pengaturan_role->id
        ]);
        $pengaturan_role_refresh = Permission::create([
            'name' => 'pengaturan.role.refresh',          // leaf permission kalau mau
            'display_name' => 'Permission Management Refresh',
            'parent_id' => $pengaturan_role->id
        ]);
        $field_agen = Permission::create([
            'name' => 'fieldagen',          // leaf permission kalau mau
            'display_name' => 'Field Agen',
            'parent_id' => null
        ]);
        $field_agen_read = Permission::create([
            'name' => 'fieldagen.read',          // leaf permission kalau mau
            'display_name' => 'Field Agen Read',
            'parent_id' => $field_agen->id
        ]);
        $field_agen_create = Permission::create([
            'name' => 'fieldagen.create',          // leaf permission kalau mau
            'display_name' => 'Field Agen Create',
            'parent_id' => $field_agen->id
        ]);
        $field_agen_update = Permission::create([
            'name' => 'fieldagen.update',          // leaf permission kalau mau
            'display_name' => 'Field Agen Update',
            'parent_id' => $field_agen->id
        ]);
        $field_agen_delete = Permission::create([
            'name' => 'fieldagen.delete',          // leaf permission kalau mau
            'display_name' => 'Field Agen Delete',
            'parent_id' => $field_agen->id
        ]);
        $field_agen_view = Permission::create([
            'name' => 'fieldagen.view',          // leaf permission kalau mau
            'display_name' => 'Field Agen View',
            'parent_id' => $field_agen->id
        ]);
    }
}
