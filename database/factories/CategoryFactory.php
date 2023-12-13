<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'description' => fake()->sentence(5),
            'image' => fake()->imageUrl(640, 480, 'cats'),
            'status' => fake()->numberBetween(0, 1),
            // 'created_by' => fake()->numberBetween(1, 10),
            // 'updated_by' => fake()->numberBetween(1, 10),
        ];
    }
}
