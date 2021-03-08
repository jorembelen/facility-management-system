<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use App\Models\WorkCategory;
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
        User::create([
            'name' => 'Jorem Belen',
            'username' => 'jorem.belen',
            'email' => 'jorembelen@gmail.com',
            'role' => 'super_admin',
            'password' => 'password',
        ]);
        
        User::create([
            'name' => 'Jilbert Mejia',
            'username' => 'jilbert.mejia',
            'email' => 'jilbert.mejia@rezayat.net',
            'role' => 'super_admin',
            'password' => 'password',
        ]);

        WorkCategory::create([
            'name' => 'Appliance Technican',
        ]);
        WorkCategory::create([
            'name' => 'HVAC Technican',
        ]);
        WorkCategory::create([
            'name' => 'Electrician',
        ]);
        WorkCategory::create([
            'name' => 'Plumber',
        ]);
        WorkCategory::create([
            'name' => 'Masonry',
        ]);
        WorkCategory::create([
            'name' => 'Carpentry',
        ]);
        WorkCategory::create([
            'name' => 'Preventive Maintenance',
        ]);
    }
}
