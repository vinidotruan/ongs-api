<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnimalPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Animal $animal): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Animal $animal): bool
    {
        return $this->isCustomerAndAnimalBelongsToCustomer($user, $animal) || $user->ong()->exists();
    }

    public function delete(User $user, Animal $animal): bool
    {
        return $this->isCustomerAndAnimalBelongsToCustomer($user, $animal) || $user->ong()->exists();
    }

    public function restore(User $user, Animal $animal): bool
    {
        return $this->isCustomerAndAnimalBelongsToCustomer($user, $animal) || $user->ong()->exists();
    }

    public function forceDelete(User $user, Animal $animal): bool
    {
       return $this->isCustomerAndAnimalBelongsToCustomer($user, $animal) || $user->ong()->exists();
    }

    private function isCustomerAndAnimalBelongsToCustomer(User $user, Animal $animal): bool
    {
        if($user->customer() && !$user->customer->animals->contains($animal->id)) {
            return false;
        }

        return true;
    }
}
