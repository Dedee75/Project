<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = Str::uuid()->toString();
        //
        DB::table('people')->insert([
            'name' => 'Kaung Htet San',
            'email'=> 'htetsan070@gmail.com',
            'address'=> 'Yangon, Myanmar',
            'age'=>21,
            'phonenumber' => '09779953380',
            'password' =>bcrypt('123456'),
            'uuid' => $uuid,
            'image'=> '-',
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
