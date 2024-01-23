<?php

namespace App\Policies;

use App\Models\ServiceProvided;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ServiceProvidedPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, ServiceProvided $serviceProvided): bool
    {
       return true;
    }

    public function create(User $user): bool
    {
        return $this->isOng($user);
    }

    public function update(User $user, ServiceProvided $serviceProvided): bool
    {
        return $this->isOng($user);
    }

    public function delete(User $user, ServiceProvided $serviceProvided): bool
    {
        return $this->isOng($user);
    }

    public function restore(User $user, ServiceProvided $serviceProvided): bool
    {
        return $this->isOng($user);
    }

    public function forceDelete(User $user, ServiceProvided $serviceProvided): bool
    {
        return $this->isOng($user);
    }

    private function isOng(User $user): bool
    {
        return !!$user->ong();
    }
}
