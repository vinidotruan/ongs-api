<?php

namespace Database\Seeders;

use App\Models\ServiceProvided;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceProvidedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceProvided::create(["name"=>"Vacinacao"]);
        ServiceProvided::create(["name"=>"Castracao"]);
        ServiceProvided::create(["name"=>"Check-up"]);
    }
}
