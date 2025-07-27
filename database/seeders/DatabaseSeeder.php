<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\WebModelSeeder;
use Database\Seeders\MenuModelSeeder;
use Database\Seeders\RoleModelSeeder;
use Database\Seeders\UserModelSeeder;
use Database\Seeders\AksesModelSeeder;
use Database\Seeders\SubmenuModelSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleModelSeeder::class,
            // JenisBarangModelSeeder::class,
            MenuModelSeeder::class,
            UserModelSeeder::class,
            AksesModelSeeder::class,
            WebModelSeeder::class,
            SubmenuModelSeeder::class
            // SubMenuModelSeeder::class
        ]);

    }
}
