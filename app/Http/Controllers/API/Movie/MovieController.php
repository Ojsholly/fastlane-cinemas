<?php

namespace App\Http\Controllers\API\Movie;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie\MovieResourceCollection;
use App\Repositories\BranchRepository;
use App\Repositories\MovieRepository;
use App\Repositories\ScheduleRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public MovieRepository $movieRepository;
    public BranchRepository $branchRepository;
    public ScheduleRepository $scheduleRepository;

    public function __construct(BranchRepository $branchRepository, MovieRepository $movieRepository, ScheduleRepository $scheduleRepository)
    {
        $this->branchRepository = $branchRepository;
        $this->movieRepository = $movieRepository;
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = $this->movieRepository->getAll(['schedules']);

        return response()->success(new MovieResourceCollection($movies), "Movie list fetched successfully");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = DB::transaction(function () use ($request){

            $movie = $this->movieRepository->create($request->only('title', 'description', 'poster'));

            foreach ($request->branch_ids as $branch_id) {
                $this->scheduleRepository->createSchedule([
                    'movie_id' => $movie->uuid,
                    'branch_id' => $branch_id,
                    'start_at' => Carbon::parse($request->date." ".$request->time)->toDateString()
                ]);
            }
        });

        return response()->success([], "Movie schedule created successfully");
    }
}
