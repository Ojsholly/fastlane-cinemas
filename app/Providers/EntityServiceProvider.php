<?php

namespace App\Providers;

use App\Interfaces\BranchRepositoryInterface;
use App\Interfaces\MovieRepositoryInterface;
use App\Interfaces\ScheduleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\BranchRepository;
use App\Repositories\MovieRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
