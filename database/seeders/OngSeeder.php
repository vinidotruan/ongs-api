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
        Ong::factory()
            ->count(1)
            ->create();

        $user = User::first();
        $user->ong()->save(Ong::first());
    }
}
