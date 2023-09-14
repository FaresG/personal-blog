<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(50)
            ->has(Post::factory(3)
                ->hasAttached(
                    Category::factory(2),
                    ['created_at' => now(), 'updated_at' => now()]
                ))
            ->create();
    }
}
