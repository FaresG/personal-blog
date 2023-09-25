<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'role_id' => Role::ADMINISTRATOR,
            'email' => 'fares@test.com',
            'username' => 'fares',
            'firstname' => 'fares',
            'lastname' => 'g',
            'mobile' => '123456789',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // randoms
        User::factory()
            ->count(5)
            ->has(Post::factory(3)
                ->hasAttached(
                    Category::factory(2),
                    ['created_at' => now(), 'updated_at' => now()]
                ))
            ->create();
    }
}
