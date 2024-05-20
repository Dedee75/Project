<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([[
            'name'=>'Admin',
            'status'=>'Active',
            'uuid'=>'test',

        ],
        [
            'name'=>'Manager',
            'status'=>'Active',
            'uuid'=>'test',

        ],
        [
            'name'=>'Staff',
            'status'=>'Active',
            'uuid'=>'test',

        ],
        [
            'name'=>'OJT',
            'status'=>'Active',
            'uuid'=>'test',

        ]
    ]);
    }
}
