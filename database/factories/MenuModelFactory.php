<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuModel>
 */
class MenuModelFactory extends Seeder
{
    /**
     * Define the model's default state.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('tbl_menu')->insert([
            [
                'menu_id' => '1667444041',
                'menu_judul' => 'Dashboard',
                'menu_slug' => 'dashboard',
                'menu_redirect' => '/dashboard',
                'menu_sort' => 1,
                'menu_type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]
        ]);
    }
}
