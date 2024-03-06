<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(["email" => "teste@teste.com", "password"=> Hash ::make('password')]);
        User::create(["email" => "funcionario@teste.com", "password"=> Hash ::make('password')]);
        User::create(["email" => "ong@teste.com", "password"=> Hash ::make('password')]);
        User::create(["email" => "cliente@teste.com", "password"=> Hash ::make('password')]);
    }
}
