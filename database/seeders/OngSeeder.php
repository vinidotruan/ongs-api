<?php

namespace Database\Seeders;

use App\Models\Ong;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ong::factory()->create([
            'name' => 'Ong Teste',
            'email' => "ong@teste.com",
            'user_id' => User::where(['email' => 'ong@teste.com'])->first()->id,
        ]);
    }
}
