<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use ILluminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $uuid = Str::uuid()->toString();

        DB::table('categories')->insert([
            [
                'name' => 'Desktop',
                'status' => 'Active',
                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Laptop',
                'status' => 'Active',
                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Accessories',
                'status' => 'Active',
                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
