<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
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
            "name" => $this->faker->name(),
            "cpf" => $this->faker->numerify(),
            "whatsapp" => $this->faker->phoneNumber(),
            "user_id" => UserFactory::new(),
        ];
    }
}
