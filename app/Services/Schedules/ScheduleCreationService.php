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
        try {
            $employee = Employee::find($this->data['employee_id']);
            $service = $employee->servicesProvided()->find($this->data['service_id']);

            $newData = [
                "start" => $this->data['start'],
                "duration" => $this->data['duration'],
                "employee_service_id" => $service->pivot->id
            ];
            DB::beginTransaction();
            $response = $this->schedule->create($newData);
            DB::commit();
            return $response;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
