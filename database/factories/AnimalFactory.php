<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->userName(),
            "breed" => $this->faker->word(),
            "birthday" => $this->faker->date(),
            "weight" => $this->faker->randomFloat(),
            "customer_id" => Customer::first()->id,
        ];
    }
}
