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
        ServiceProvided::factory()->count(3)->create();
    }
}
