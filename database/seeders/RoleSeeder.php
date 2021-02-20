<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Store roles in array
        $items =
        [            
            ['id' => 1, 'name' => 'Admin', 'slug' => 'admin'],
            ['id' => 2, 'name' => 'Recruiter', 'slug' => 'recruiter'],
            ['id' => 3, 'name' => 'User', 'slug' => 'user']
        ];

        // Update or create records as necessary
        foreach ($items as $item)
        {
            Role::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
