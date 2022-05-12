<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perjalanan;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Perjalanan::factory(50)->create();

        // User::factory(20)->create();
    }
}
