<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributesFactory extends Factory
{
    public function definition()
    {
        return [
            'product_id' => null,
            'key' => $this->faker->sentence(),
            'value' => $this->faker->sentence(),
        ];
    }
}
