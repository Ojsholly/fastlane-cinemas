<?php

namespace App\Repositories;

use App\Interfaces\BranchRepositoryInterface;
use App\Models\Branch;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

class BranchRepository implements BranchRepositoryInterface
{
    /**
     * @param array $params
     * @param array $relations
     * @return Builder[]|Collection
     */
    public function getAllBranches(array $params = [], array $relations = []): Collection|array
    {
        return Branch::with($relations)->where($params)->get();
    }

    /**
     * @param array $params
     * @return Branch
     */
    public function createBranch(array $params): Branch
    {
        return Branch::create($params);
    }

    /**
     * @param string $id
     * @param array $relations
     * @return Branch
     * @throws Throwable
     */
    public function getBranchById(string $id, array $relations = []): Branch
    {
        $branch = Branch::findByUuid($id);

        throw_if(!$branch, new ModelNotFoundException('Requested branch not found.'), ResponseAlias::HTTP_NOT_FOUND);

        return $branch;
    }
}
