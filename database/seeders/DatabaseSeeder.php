<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BanksSeeder;
use Database\Seeders\MaterialSeeder;
use Database\Seeders\LoanProductsSeeder;
use Database\Seeders\PropertySeeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            BanksSeeder::class,
            MaterialSeeder::class,
            LoanProductsSeeder::class,
            PropertySeeder::class,
            UsersSeeder::class,
        ]);
    }
}
