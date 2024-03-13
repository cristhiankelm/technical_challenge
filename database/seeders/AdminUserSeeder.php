<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Cristhian',
            'last_name' => 'Kelm',
            'email' => 'cris@admin.com',
            'password' => Hash::make('cris'),
            'phone_number' => '0986496865',
            'address' => 'Ciudad del Este'
        ]);
    }
}
