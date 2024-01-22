<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnimalPolicy
{
    public function viewAny(User $user): bool
    {
        if(!$user->ong()) {
            return false;
        }

        return true;
    }

    public function view(User $user, Animal $animal): bool
    {
        if($user->customer() && !$user->customer->animals->contains($animal->id)) {
            return false;
        }

        return true;
    }

    public function create(User $user): bool
    {
        if(!$user->customer()) {
            return false;
        }
        return true;
    }

    public function update(User $user, Animal $animal): bool
    {
        if($user->customer() && !$user->customer->animals->contains($animal->id)) {
            return false;
        }

        return true;
    }

    public function delete(User $user, Animal $animal): bool
    {
        if($user->customer() && !$user->customer->animals->contains($animal->id)) {
            return false;
        }

        return true;
    }

    public function restore(User $user, Animal $animal): bool
    {
        if($user->customer() && !$user->customer->animals->contains($animal->id)) {
            return false;
        }

        return true;
    }

    public function forceDelete(User $user, Animal $animal): bool
    {
       if($user->customer() && !$user->customer->animals->contains($animal->id)) {
            return false;
       }

       return true;
    }
}
