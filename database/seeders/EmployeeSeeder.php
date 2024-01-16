<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\ServiceProvided;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Employee::factory()
          ->count(1)
          ->create();

      $e = Employee::first();
      $e->servicesProvided()->attach(ServiceProvided::first());
    }
}
