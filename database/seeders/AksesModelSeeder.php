<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AksesModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_akses')->insert(
            [
                // Dashboard akses admin rules
                [
                    'menu_id' => '1667444041', //Dashboard
                    'role_id' => 5,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => 5,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => 5,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => 5,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'menu_id' => '166509889', //Master Barang
                    'role_id' => 5,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '166509889',
                    'role_id' => 5,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '166509889',
                    'role_id' => 5,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '166509889',
                    'role_id' => 5,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'menu_id' => '1668510437', //Request
                    'role_id' => 5,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => 5,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => 5,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => 5,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641', //Order
                    'role_id' => 5,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641',
                    'role_id' => 5,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641',
                    'role_id' => 5,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641',
                    'role_id' => 5,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                [
                    'menu_id' => '1668510568', //Laporan
                    'role_id' => 5,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510568',
                    'role_id' => 5,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510568',
                    'role_id' => 5,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                
                [
                    'menu_id' => '1668510568', 
                    'role_id' => 5,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                // [
                //     'menu_id' => '1668520467',//materai
                //     'role_id' => 5,
                //     'akses_type' => 'view',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'menu_id' => '1668520467',
                //     'role_id' => 5,
                //     'akses_type' => 'create',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'menu_id' => '1668520467',
                //     'role_id' => 5,
                //     'akses_type' => 'update',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'menu_id' => '1668520467',
                //     'role_id' => 5,
                //     'akses_type' => 'delete',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                
                

                // Dashboard akses manager rules
                // [
                //     'menu_id' => '1667444041', //Dashboard
                //     'role_id' => 4,
                //     'akses_type' => 'view',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '1667444041',
                //     'role_id' => 4,
                //     'akses_type' => 'create',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '1667444041',
                //     'role_id' => 4,
                //     'akses_type' => 'update',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '1667444041',
                //     'role_id' => 4,
                //     'akses_type' => 'delete',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '166509889', //Master Barang
                //     'role_id' => 4,
                //     'akses_type' => 'view',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '166509889',
                //     'role_id' => 4,
                //     'akses_type' => 'create',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '166509889',
                //     'role_id' => 4,
                //     'akses_type' => 'update',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '166509889',
                //     'role_id' => 4,
                //     'akses_type' => 'delete',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                // [
                //     'menu_id' => '1668510568', //Laporan
                //     'role_id' => 4,
                //     'akses_type' => 'view',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '1668510568',
                //     'role_id' => 4,
                //     'akses_type' => 'create',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '1668510568',
                //     'role_id' => 4,
                //     'akses_type' => 'update',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '1668510568',
                //     'role_id' => 4,
                //     'akses_type' => 'delete',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                
                // Dashboard akses user rules
                [
                    'menu_id' => '1667444041', //Dashboard
                    'role_id' => 6,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => 6,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => 6,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => 6,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

                // [
                //     'menu_id' => '166509889', //Master Barang
                //     'role_id' => 6,
                //     'akses_type' => 'view',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '166509889',
                //     'role_id' => 6,
                //     'akses_type' => 'create',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '166509889',
                //     'role_id' => 6,
                //     'akses_type' => 'update',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],
                // [
                //     'menu_id' => '166509889',
                //     'role_id' => 6,
                //     'akses_type' => 'delete',
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                // ],

                [
                    'menu_id' => '1668510437', //Transaksi
                    'role_id' => 6,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => 6,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => 6,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => 6,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641', //Request
                    'role_id' => 6,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641',
                    'role_id' => 6,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
               
            ]);
            
            DB::table('tbl_akses')->insert(
                //Sub Menu Admin Rules
                [
                    [
                        'submenu_id' => '1',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '1',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '1',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ], 

                    [
                        'submenu_id' => '1',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '2',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '2',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '2',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '2',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    
                    [
                        'submenu_id' => '3',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '3',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '3',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '3',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '4',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '4',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '4',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '4',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '5',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '5',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '5',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '5',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '6',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '6',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '6',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '6',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '7',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '7',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '7',
                        'role_id' => '5',
                        'akses_type' => 'udpate',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '7',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '5',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '5',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '5',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '5',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                      // Sub Menu Role Manager
        
                    [
                        'submenu_id' => '3',
                        'role_id' => '4',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                  
                    [
                        'submenu_id' => '4',
                        'role_id' => '4',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                  
                    [
                        'submenu_id' => '5',
                        'role_id' => '4',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '6',
                        'role_id' => '4',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],

                    [
                        'submenu_id' => '7',
                        'role_id' => '4',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '7',
                        'role_id' => '4',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '7',
                        'role_id' => '4',
                        'akses_type' => 'udpate',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '7',
                        'role_id' => '4',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '4',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '4',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '4',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '8',
                        'role_id' => '4',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '4',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '4',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '4',
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '9',
                        'role_id' => '4',
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                  

                    // Sub Menu Role User
                    // [
                    //     'submenu_id' => '1',
                    //     'role_id' => '6',
                    //     'akses_type' => 'view',
                    //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    //     'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    // ],

                    [
                        'submenu_id' => '2',
                        'role_id' => '6',
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => '2',
                        'role_id' => '6',
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                
                    // [
                    //     'submenu_id' => '3',
                    //     'role_id' => '6',
                    //     'akses_type' => 'view',
                    //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    //     'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    // ],
                  
                    // [
                    //     'submenu_id' => '4',
                    //     'role_id' => '6',
                    //     'akses_type' => 'view',
                    //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    //     'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    // ],
                  
                    // [
                    //     'submenu_id' => '5',
                    //     'role_id' => '6',
                    //     'akses_type' => 'view',
                    //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    //     'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    // ],
               
                    // [
                    //     'submenu_id' => '6',
                    //     'role_id' => '6',
                    //     'akses_type' => 'view',
                    //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    //     'Updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    // ],
                  
                ]);      
    }
}

