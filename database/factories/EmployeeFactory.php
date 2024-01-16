<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Ong;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{

    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "cpf" => $this->faker->numerify(),
            "user_id" => UserFactory::new(),
            "ong_id" => Ong::first(),
        ];
    }
}
