<?php

namespace App\Repositories;

use App\Interfaces\ScheduleRepositoryInterface;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    /**
     * @param array $params
     * @param array $relations
     * @return Builder[]|Collection
     */
    public function getSchedules(array $params = [], array $relations = []): Collection|array
    {
        return Schedule::with($relations)->where($params)->get();
    }

    /**
     * @param array $params
     * @return Schedule
     */
    public function createSchedule(array $params): Schedule
    {
        return Schedule::create($params);
    }
}
