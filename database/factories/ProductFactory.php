<?php

namespace Database\Factories;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_type_id' => ProductType::factory(),
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'image' => 'images/products/dummy.jpg',
            'price' => rand(1000, 50000)
        ];
    }
}
