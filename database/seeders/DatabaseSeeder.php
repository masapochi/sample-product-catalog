<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Icon;
use App\Models\Item;
use App\Models\Spec;
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
        Category::factory()
            ->has(Category::factory()
                ->has(Item::factory()
                    ->has(Feature::factory()->count(3), 'features')
                    ->has(Spec::factory()->count(3), 'specs')
                    ->has(Icon::factory()->count(3), 'icons')
                    ->count(3), 'items')
                ->count(3), 'children')
            ->count(3)->create();
    }
}
