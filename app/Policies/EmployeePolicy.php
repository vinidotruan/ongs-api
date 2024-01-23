<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
{
    public function viewAny(User $user): bool
    {
        if(!$user->ong()) {
            return false;
        }

        return true;
    }

    public function view(User $user, Employee $employee): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        if(!$user->ong()) {
            return false;
        }
        return true;
    }

    public function update(User $user, Employee $employee): bool
    {
        if(($user->employee() && $user->employee()->id === $employee->id) || $user->ong()) {
            return true;
        }
        return false;
    }

    public function delete(User $user, Employee $employee): bool
    {
        if(($user->employee() && $user->employee()->id === $employee->id) || $user->ong()) {
            return true;
        }
        return false;
    }

    public function restore(User $user, Employee $employee): bool
    {
        return false;
    }

    public function forceDelete(User $user, Employee $employee): bool
    {
        return false;
    }
}
