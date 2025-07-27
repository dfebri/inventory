<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_menu')->insert(
            [
                [
                    'menu_id' => '1667444041',
                    'menu_judul' => 'Dashboard',
                    'menu_slug' => 'dashboard',
                    'menu_icon' => 'home',
                    'menu_redirect' => '/dashboard',
                    'menu_sort' => 1,
                    'menu_type' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'menu_id' => '166509889',
                    'menu_judul' => 'Master Barang',
                    'menu_slug' => 'master-barang',
                    'menu_icon' => 'package',
                    'menu_redirect' => '-',
                    'menu_sort' => 2,
                    'menu_type' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'menu_id' => '1668510437',
                    'menu_judul' => 'Request',
                    'menu_slug' => 'request',
                    'menu_icon' => 'user',
                    'menu_redirect' => '-',
                    'menu_sort' => 3,
                    'menu_type' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'menu_id' => '1669390641',
                    'menu_judul' => 'Order Barang',
                    'menu_slug' => 'order-barang',
                    'menu_icon' => 'shopping-bag',
                    'menu_redirect' => '/order',
                    'menu_sort' => 4,
                    'menu_type' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                // [
                //     'menu_id' => '1668520467',
                //     'menu_judul' => 'Materai',
                //     'menu_slug' => 'materai',
                //     'menu_icon' => 'wpforms',
                //     'menu_redirect' => '-',
                //     'menu_sort' => 5,
                //     'menu_type' => 1,
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

                // ],

                [
                    'menu_id' => '1668510568',
                    'menu_judul' => 'Laporan',
                    'menu_slug' => 'laporan',
                    'menu_icon' => 'printer',
                    'menu_redirect' => '-',
                    'menu_sort' => 5,
                    'menu_type' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]

            ]
        );  
    }
}
