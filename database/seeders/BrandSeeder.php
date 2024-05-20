<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $uuid = Str::uuid()->toString();

        DB::table('brands')->insert([
            [
                'name' => 'Dell',
                'date' => Carbon::now(),
                'staff_id' => 1,
                'uuid' => $uuid,
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lenovo',
                'date' => Carbon::now(),
                'staff_id' => 2,
                'uuid' => $uuid,
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
