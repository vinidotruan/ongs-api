<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerPolicy
{
    public function viewAny(User $user): bool
    {
        if($user->customer()) {
            return false;
        }
        return true;
    }

    public function view(User $user, Customer $customer): bool
    {
        if($user->customer() && !$user->customer->id === $customer->id) {
            return false;
        }
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Customer $customer): bool
    {
        if($user->customer() && $user->customer->id === $customer->id) {
            return true;
        }

        return false;

    }

    public function delete(User $user, Customer $customer): bool
    {
        if($user->customer() && $user->customer->id === $customer->id) {
            return true;
        }

        return false;
    }

    public function restore(User $user, Customer $customer): bool
    {
        return false;
    }

    public function forceDelete(User $user, Customer $customer): bool
    {
        return false;
    }
}
