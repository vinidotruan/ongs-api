<?php

namespace App\Providers;

use App\Models\Animal;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Ong;
use App\Models\ServiceProvided;
use App\Policies\AnimalPolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\OngPolicy;
use App\Policies\ServiceProvidedPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Animal::class => AnimalPolicy::class,
        Appointment::class => AppointmentPolicy::class,
        Customer::class => CustomerPolicy::class,
        Employee::class => EmployeePolicy::class,
        Ong::class => OngPolicy::class,
        ServiceProvided::class => ServiceProvidedPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
