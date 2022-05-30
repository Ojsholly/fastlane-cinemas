<?php

namespace App\Interfaces;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;

interface ScheduleRepositoryInterface
{
    public function getSchedules(array $params = [], array $relations = []): Collection|array;
    public function createSchedule(array $params): Schedule;
}
