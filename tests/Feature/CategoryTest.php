<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Spec;
use App\Models\Icon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public $rootCategories;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function initializeModels()
    {
        $this->rootCategories = Category::factory()
            ->has(Category::factory()
                ->has(Item::factory()
                    ->has(Feature::factory()->count(3), 'features')
                    ->has(Spec::factory()->count(3), 'specs')
                    ->has(Icon::factory()->count(3), 'icons')
                    ->count(3), 'items')
                ->count(3), 'children')
            ->count(3)->create();
    }

    /**
     * @test
     */
    public function ルートディレクトリアクセスした時に第一階層のカテゴリが表示されている()
    {
        $this->withoutExceptionHandling();
        $this->initializeModels();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('categories.list');
        $response->assertViewHasAll(['list']);
        $response->assertSee($this->rootCategories[0]->name);
        $response->assertSee($this->rootCategories[1]->name);
        $response->assertSee($this->rootCategories[2]->name);
    }

    /**
     * @test
     */
    public function 第一階層のカテゴリIDを指定した時に第二階層のカテゴリが表示される()
    {
        $this->withoutExceptionHandling();
        $this->initializeModels();

        $current    = $this->rootCategories[0];
        $categories = $current->children;

        $response = $this->get("/{$current->slug}");

        $response->assertStatus(200);
        $response->assertViewIs('categories.list');
        $response->assertViewHasAll(['current', 'list']);
        $response->assertSee($current->name);
        $response->assertSee($categories[0]->name);
        $response->assertSee($categories[1]->name);
        $response->assertSee($categories[2]->name);
    }

    /**
     * @test
     */
    public function 第二階層にカテゴリIDを指定した時にアイテム一覧が表示される()
    {
        $this->withoutExceptionHandling();
        $this->initializeModels();

        $lev1    = $this->rootCategories[0];
        $current = $lev1->children[0];
        $items   = $current->items;

        $response = $this->get("/{$lev1->slug}/{$current->slug}");
        $response->assertStatus(200);
        $response->assertViewIs('items.list');
        $response->assertViewHasAll(['parents', 'current', 'list']);

        $response->assertSee($lev1->name);
        $response->assertSee($current->name);
        $response->assertSee($items[0]->name);
        $response->assertSee($items[1]->name);
        $response->assertSee($items[2]->name);
    }

    /**
     * @test
     */
    public function 第三階層にアイテムIDを指定した時にアイテム詳細が表示される()
    {
        $this->withoutExceptionHandling();
        $this->initializeModels();

        $lev1     = $this->rootCategories[0];
        $lev2     = $lev1->children[0];
        $current  = $lev2->items[0];
        $specs    = $current->specs;
        $features = $current->features;
        $icons    = $current->icons;

        $response = $this->get("/{$lev1->slug}/{$lev2->slug}/{$current->slug}");

        $response->assertStatus(200);
        $response->assertViewIs('items.show');
        $response->assertViewHasAll(['parents', 'current']);

        $response->assertSee($lev1->name);
        $response->assertSee($lev2->name);
        $response->assertSee($current->name);
        $response->assertSee($specs[0]->heading);
        $response->assertSee($features[0]->heading);
        $response->assertSee($icons[0]->name);
    }

    /**
     * @test
     */

    public function 第一階層に存在しないカテゴリIDを指定した時に404エラーを返す()
    {
        $response  = $this->get('/not-exist-category');

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function 第二階層に存在しないカテゴリIDを指定した時に404エラーを返す()
    {
        $this->initializeModels();

        $lev1 = $this->rootCategories[0];

        $response = $this->get("/{$lev1->slug}/not-exist-category");
        $response->assertStatus(404);
    }
    /**
     * @test
     */
    public function 第二階層に存在しないアイテムIDを指定した時に404エラーを返す()
    {
        $this->initializeModels();

        $lev1     = $this->rootCategories[0];
        $lev2     = $lev1->children[0];

        $response = $this->get("/{$lev1->slug}/{$lev2->slug}/not-exist-item");
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function キーワード検索で正しい結果を返す()
    {
        $this->withoutExceptionHandling();

        $item1 = Item::factory()->create([
            'category_id' => 1,
            'name'        => 'product1'
        ]);
        $item2 = Item::factory()->create([
            'category_id' => 1,
            'name'        => 'product2'
        ]);
        $item3 = Item::factory()->create([
            'category_id' => 1,
            'name'        => 'product3'
        ]);

        $response = $this->get('/search?q=product');
        $response->assertStatus(200);
        $response->assertViewIs('search');
        $response->assertSeeText($item1->name);
        $response->assertSeeText($item2->name);
        $response->assertSeeText($item3->name);
    }

    /**
     * @test
     */
    public function キーワード検索でキーワードがない場合ホーム画面にリダイレクト()
    {
        $response = $this->get('/search');
        $response->assertRedirect(route('home'));
    }
}
