<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        {
            DB::table('tbl_role')->insert(
                [
                    [
                        'role_title' => 'Manager',
                        'role_slug' => 'manager',
                        'role_desc' => '-',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'role_title' => 'Admin',
                        'role_slug' => 'admin',
                        'role_desc' => '-',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'role_title' => 'User',
                        'role_slug' => 'user',
                        'role_desc' => '-',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                ]
            );
        }
    }
}
