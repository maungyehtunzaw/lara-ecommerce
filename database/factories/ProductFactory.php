<?php

namespace Database\Factories;

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
            'name' => fake()->word(),
            'description' => fake()->sentence(20),
            // 'unit_rate' => fake()->randomFloat(2,1000,5000),
            'unit_rate' => fake()->numberBetween(1, 9) * 1000,
            'image' => fake()->imageUrl(640, 480, 'cats'),
            'categories_id' => fake()->numberBetween(1, 12),
            'is_recommend'=>fake()->boolean(),
            'created_by' => fake()->numberBetween(1, 10),
            'updated_by' => fake()->numberBetween(1, 10),
        ];
    }
}
