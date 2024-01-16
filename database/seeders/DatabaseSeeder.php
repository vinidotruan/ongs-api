<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            OngSeeder::class,
            ServiceProvidedSeeder::class,
            EmployeeSeeder::class,
            CustomerSeeder::class,
            AnimalSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
