<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductAttributes;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductAttributesControllerTest extends TestCase
{
    use RefreshDatabase;


    public function test_visit_product_attributes_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->get(route('viewAttr', ['product' => $product]));
        $response->assertStatus(200);
        $response->assertViewIs('products.viewAttr');
        $response->assertViewHas(['productAttributes', 'product']);
    }

    public function test_visit_product_attribute_create_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->get(route('addAttr', ['product' => $product]));
        $response->assertStatus(200);
        $response->assertViewIs('products.addAttr');
        $response->assertViewHas('product');
    }

    public function test_saving_product_attribute()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();
        $attribute = ProductAttributes::factory()->create([
            'product_id' => $product->id,
        ]);

        $this->followingRedirects();
        $response = $this->post(route('saveAttr', ['attribute' => $attribute, 'product' => $product]));
        $response->assertStatus(200);
    }

    public function test_deleting_product_attribute()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();
        $attribute = ProductAttributes::factory()->create([
            'product_id' => $product->id,
        ]);

        $this->followingRedirects();
        $response = $this->delete(route('deleteAttr', ['attrId' => $attribute->id, 'product' => $product]));
        $response->assertStatus(200);
    }
}
