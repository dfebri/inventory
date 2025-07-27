<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JenisBarangModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_jenisbarang')->insert([
            [
                'jenisbarang_nama' => 'Alat Tulis', 
                'jenisbarang_slug' => 'alat-tulis',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'jenisbarang_nama' => 'Buku dan Form', 
                'jenisbarang_slug' => 'buku-dan-form',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'jenisbarang_nama' => 'Document Kepper', 
                'jenisbarang_slug' => 'document-kepper',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'jenisbarang_nama' => 'Kertas HVS', 
                'jenisbarang_slug' => 'kertas-hvs',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'jenisbarang_nama' => 'Amplop', 
                'jenisbarang_slug' => 'amplop',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'jenisbarang_nama' => 'Office Tools', 
                'jenisbarang_slug' => 'office-tools',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'jenisbarang_nama' => 'Perlengkapan Komputer', 
                'jenisbarang_slug' => 'perlengkapan-komputer',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'jenisbarang_nama' => 'Cetakan', 
                'jenisbarang_slug' => 'cetakan',
                'jenisbarang_keterangan' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);
    }
}
