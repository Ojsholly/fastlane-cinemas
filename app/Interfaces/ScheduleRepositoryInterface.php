<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ScheduleRepositoryInterface
{
    public function getSchedules(array $params = [], array $relations = []): Collection|array;
}
