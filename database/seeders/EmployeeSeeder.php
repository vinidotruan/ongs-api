<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $e = Employee::create([
          "name" => "Empregado Teste",
          "user_id" => User::where(['email' => "funcionario@teste.com"])->first()->id,
          "cpf" => "12345678901",
      ]);
    }
}
