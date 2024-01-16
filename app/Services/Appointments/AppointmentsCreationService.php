<?php

namespace App\Services\Appointments;

use App\Models\Appointment;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class AppointmentsCreationService extends BaseService
{
    private array $data;
    public function __construct(private readonly Appointment $appointments)
    {
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        return DB::transaction(fn() => $this->appointments->create($this->data) );
    }
}
