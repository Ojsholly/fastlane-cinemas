<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface MovieRepositoryInterface
{
    public function getAll(array $relations = []): Collection;
}
