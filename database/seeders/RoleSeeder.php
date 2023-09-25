<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'User',
            'description' => 'Basic user plan.'
        ]);

        Role::factory()->create([
            'name' => 'Administrator',
            'description' => 'Basic admin plan.'
        ]);
    }
}
