<?php

namespace App\Policies;

use App\Models\Ong;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OngPolicy
{
    public function viewAny(User $user): bool
    {
        if(!$user->customer()) {
            return false;
        }

        return true;
    }

    public function view(User $user, Ong $ong): bool
    {
        if($user->ong()->id !== $ong->id) {
            return false;
        }

        if($user->employee()->ong()->id !== $ong->id) {
            return false;
        }

        return true;

    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Ong $ong): bool
    {
        if($user->ong()->id !== $ong->id) {
            return false;
        }

        return true;
    }

    public function delete(User $user, Ong $ong): bool
    {
        if($user->ong()->id !== $ong->id) {
            return false;
        }

        return true;
    }

    public function restore(User $user, Ong $ong): bool
    {
        return false;
    }

    public function forceDelete(User $user, Ong $ong): bool
    {
        return false;
    }
}
