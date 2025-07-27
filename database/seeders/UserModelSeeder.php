<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_user')->insert(
            [
                [
                    'role_id' => 4,
                    'user_nmlengkap' => 'Manager',
                    'user_name' => 'Manager',
                    'user_email' => 'manager@gmail.com',
                    'user_foto' => 'undraw_profile.svg',
                    'user_password' => md5('manager123'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'role_id' => 5,
                    'user_nmlengkap' => 'Super Administrator',
                    'user_name' => 'Administrator',
                    'user_email' => 'admin@gmail.com',
                    'user_foto' => 'undraw_profile.svg',
                    'user_password' => md5('admin123'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'role_id' => 6,
                    'user_nmlengkap' => 'User',
                    'user_name' => 'user',
                    'user_email' => 'user@gmail.com',
                    'user_foto' => 'undraw_profile.svg',
                    'user_password' => md5('user123'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
                // [
                //     'role_id' => 6,
                //     'user_nmlengkap' => 'User',
                //     'user_name' => 'Operation',
                //     'user_email' => 'hongkop.filiphy@mlbagency.co.id',
                //     'user_foto' => 'undraw_profile.svg',
                //     'user_password' => md5('opr12345'),
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'role_id' => 6,
                //     'user_nmlengkap' => 'User',
                //     'user_name' => 'HRGA',
                //     'user_email' => 'febri.murcahyo@mgmaritim.com',
                //     'user_foto' => 'undraw_profile.svg',
                //     'user_password' => md5('hrga123'),
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'role_id' => 6,
                //     'user_nmlengkap' => 'User',
                //     'user_name' => 'Commercial',
                //     'user_email' => 'melda.yulianti@mgmaritim.com',
                //     'user_foto' => 'undraw_profile.svg',
                //     'user_password' => md5('commercial*123'),
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'role_id' => 6,
                //     'user_nmlengkap' => 'User',
                //     'user_name' => 'SCM',
                //     'user_email' => 'keken.hartiwi@mgmaritim.com',
                //     'user_foto' => 'undraw_profile.svg',
                //     'user_password' => md5('scm#123'),
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
            ]
        );   
    }
}
