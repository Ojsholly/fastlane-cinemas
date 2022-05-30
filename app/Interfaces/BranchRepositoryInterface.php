<?php

namespace App\Interfaces;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;

interface BranchRepositoryInterface
{
    public function getAllBranches(): Collection|array;
    public function createBranch(array $params);
    public function getBranchById(string $id, array $relations = []): Branch;
}
