<?php

namespace App\Repositories;

use App\Models\Branch;

class BranchRepository
{
    public function getAllBranches()
    {
        return Branch::all();
    }
}
