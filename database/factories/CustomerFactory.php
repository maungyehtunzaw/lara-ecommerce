<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' =>fake()->userName(),
            'first_name'=> fake()->firstName(),
            'last_name'=> fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'password' => bcrypt('password'), // password
            'address' => fake()->address(),
            'created_by' => fake()->numberBetween(1, 10),
            'updated_by' => fake()->numberBetween(1, 10),
        ];
    }
}
