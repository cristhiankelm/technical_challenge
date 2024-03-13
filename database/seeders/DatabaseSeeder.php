<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class
        ]);
        
        // User Factory
         User::factory(10)->create();
         
         // Income - Expense Factory
        Income::factory(130)->create();
        Expense::factory(95)->create();
    }
}
