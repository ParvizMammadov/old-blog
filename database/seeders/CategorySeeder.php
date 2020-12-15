<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Science', 'Physics', 'Chemistry', 'Mathematics', 'Programming', 'History', 'Foreign Languages'];
        foreach($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>Str::slug($category)
            ]);
        }
    }
}
