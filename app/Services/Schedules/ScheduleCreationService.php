<?php

namespace App\Services\Schedules;

use App\Models\Employee;
use App\Models\Schedule;
use App\Models\ServiceProvided;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class ScheduleCreationService extends BaseService
{
    private array $data;
    public function __construct(private readonly Schedule $schedule)
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
        return DB::transaction(function() {
            $employee = Employee::find($this->data['employee_id']);
            $service = $employee->servicesProvided()->find($this->data['service_id']);

            return $this->schedule->create([...$this->data, "employee_service_id" => $service->pivot->id]);
        });
    }
}
