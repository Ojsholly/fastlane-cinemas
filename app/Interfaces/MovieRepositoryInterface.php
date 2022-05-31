<?php

namespace App\Interfaces;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

interface MovieRepositoryInterface
{
    public function getAll(array $relations = []): Collection;
    public function create(array $params): Movie;
}
