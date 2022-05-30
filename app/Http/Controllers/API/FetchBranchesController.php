<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Branch\BranchResourceCollection;
use App\Repositories\BranchRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FetchBranchesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param BranchRepository $branchRepository
     * @return JsonResponse
     */
    public function __invoke(Request $request, BranchRepository $branchRepository): JsonResponse
    {
        $branches = $branchRepository->getAllBranches([], ['schedules']);

        return response()->success(new BranchResourceCollection($branches), "Cinema branches fetched successfully.");
    }
}
