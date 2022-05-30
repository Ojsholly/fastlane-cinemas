<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Schedule\ScheduleResourceCollection;
use App\Repositories\ScheduleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FetchSchedulesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param ScheduleRepository $scheduleRepository
     * @return JsonResponse
     */
    public function __invoke(Request $request, ScheduleRepository $scheduleRepository): JsonResponse
    {
        $schedules = $scheduleRepository->getSchedules([], ['movie', 'branch']);
        return response()->success(new ScheduleResourceCollection($schedules), "Movie schedules retrieved successfully.");
    }
}
