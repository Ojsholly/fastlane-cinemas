<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll(array $relations = []): Collection
    {
        return Movie::with($relations)->get();
    }

    public function create(array $params): Movie
    {
        return Movie::create($params);
    }
}
