<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnimalPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Animal $animal): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Animal $animal): bool
    {
        //
    }

    public function delete(User $user, Animal $animal): bool
    {
        //
    }

    public function restore(User $user, Animal $animal): bool
    {
        //
    }

    public function forceDelete(User $user, Animal $animal): bool
    {
        //
    }
}
