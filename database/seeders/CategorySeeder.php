<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Entertainment'
        ]);

        Category::create([
            'name' => 'Technology'
        ]);

        Category::create([
            'name' => 'Science'
        ]);


        Category::create([
            'name' => 'Politics'
        ]);


        Category::create([
            'name' => 'Travel'
        ]);

    }
}
