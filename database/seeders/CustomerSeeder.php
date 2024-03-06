<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            "name" => "Customer Test",
            "cpf" => "12345678901",
            "whatsapp" => "12345678901",
            "user_id" => User::where(['email' => 'cliente@teste.com'])->first()->id,
        ]);
    }
}
