<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//php artisan migrate:fresh
//php artisan db:seed
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
        Actor::factory(10)->create();
        Category::factory()
        ->has(Film::factory()->count(4))
        ->count(10)
        ->create();
    }
}
