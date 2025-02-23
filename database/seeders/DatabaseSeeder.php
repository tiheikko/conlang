<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(1)->create();

        ArticleCategory::factory()->create([
            'name' => 'Перевод'
        ]);

        ArticleCategory::factory()->create([
            'name' => 'Грамматика'
        ]);
    }
}
