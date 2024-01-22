<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Animal;
use App\Models\Appointment;
use App\Models\Ong;
use App\Policies\AnimalPolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\OngPolicy;
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
        Ong::class => OngPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
