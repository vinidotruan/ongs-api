<?php

namespace App\Services\Schedules;

use App\Models\Schedule;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class CreationScheduleService extends BaseService
{
    private array $data;
    public function __construct(private readonly Schedule $schedule)
    {
        //
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function handle()
    {
        try {
            DB::beginTransaction();
            $schedule = $this->schedule->replicate();
            $schedule->fill([...$this->data, "employee_id" => auth()->user()->employee->id]);
            $schedule->save($this->data);
            DB::commit();
            return $schedule;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
