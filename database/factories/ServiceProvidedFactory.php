<?php

namespace Database\Factories;

use App\Models\ServiceProvided;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ServiceProvided>
 */
class ServiceProvidedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->colorName()
        ];
    }
}
