<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Category;
use App\Models\Item;
use App\Models\Spec;
use App\Models\Feature;
use App\Models\Icon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $category = Category::factory()->create();
        $item = Item::factory()->create([
            'category_id' => $category->id
        ]);
        $spec = Spec::factory()->create([
            'item_id' => $item->id
        ]);
        $feature = Feature::factory()->create([
            'item_id' => $item->id
        ]);

        $icon = Icon::factory()->create();
        dump($icon);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
