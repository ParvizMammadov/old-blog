<?php

namespace Database\Seeders;

use App\Models\Article;
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
        \App\Models\User::factory(1)->create();
        // Article::factory(20)->create();
        // $this->call(CategorySeeder::class);
        // $this->call(PageSeeder::class);
    }
}
