<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppointmentPolicy
{
    public function viewAny(User $user): bool
    {
        if($user->customer()) {
            return false;
        }

        return true;
    }

    public function view(User $user, Appointment $appointment): bool
    {
        return $this->isCostumerAndAppointmentNotBelongsToCustomer($user, $appointment);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Appointment $appointment): bool
    {
        return $this->isCostumerAndAppointmentNotBelongsToCustomer($user, $appointment);
    }

    public function delete(User $user, Appointment $appointment): bool
    {
        return $this->isCostumerAndAppointmentNotBelongsToCustomer($user, $appointment);
    }

    public function restore(User $user, Appointment $appointment): bool
    {
        return $this->isCostumerAndAppointmentNotBelongsToCustomer($user, $appointment);
    }

    public function forceDelete(User $user, Appointment $appointment): bool
    {
        return $this->isCostumerAndAppointmentNotBelongsToCustomer($user, $appointment);
    }

    private function isCostumerAndAppointmentNotBelongsToCustomer(User $user, Appointment $appointment): bool
    {
        if($user->customer() && !$user->customer->appointments->contains($appointment->id)) {
            return false;
        }

        return true;
    }
}
