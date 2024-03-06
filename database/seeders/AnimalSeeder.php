<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        Animal::factory()->create([
            "name" => "Zezinho",
            "breed" => "Cachorro",
            "birthday" => Date::today(),
            "weight" => 23.4,
            "customer_id" => Customer::first()->id
        ]);
    }
}
