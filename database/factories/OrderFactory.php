<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customers_id' => fake()->numberBetween(1, 100),
            'saleno' => fake()->dateTime(),
            'status' => fake()->numberBetween(0, 1),
            'total_amount' => fake()->numberBetween(1000, 100000),
            'total_qty' => fake()->numberBetween(1, 10),
            'created_by' => fake()->numberBetween(1, 10),
            'updated_by' => fake()->numberBetween(1, 10),
        ];
    }
}
