<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Create roles
        $this->call(RoleSeeder::class);

        // Insert users
        $this->call(UserSeeder::class);

        // Insert companies
        $this->call(CompanySeeder::class);
    }
}
