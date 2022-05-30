<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Branch\BranchResourceCollection;
use App\Repositories\BranchRepository;
use Illuminate\Http\Request;

class FetchBranchesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, BranchRepository $branchRepository)
    {
        $branches = $branchRepository->getAllBranches([], ['schedules']);

        return response()->success(new BranchResourceCollection($branches), "Cinema branches fetched successfully.");
    }
}
