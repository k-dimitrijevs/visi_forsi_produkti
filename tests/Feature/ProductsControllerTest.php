<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_visit_products_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas(['products']);
    }

    public function test_visit_products_create_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get(route('products.create'));
        $response->assertStatus(200);
        $response->assertViewIs('products.create');
    }

    public function test_creating_new_product()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $this->followingRedirects();
        $response = $this->post(route('products.store', ['product' => $product]));
        $response->assertStatus(200);
    }

    public function test_visit_product_edit_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->get(route('products.edit', ['product' => $product]));
        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
        $response->assertViewHas(['product']);
    }

    public function test_update_edited_task()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $this->followingRedirects();
        $response = $this->put(route('products.update', ['product' => $product]));
        $response->assertStatus(200);
    }

    public function test_deleting_product()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $this->followingRedirects();
        $response = $this->delete(route('products.destroy', ['product' => $product]));
        $response->assertStatus(200);
    }
}
