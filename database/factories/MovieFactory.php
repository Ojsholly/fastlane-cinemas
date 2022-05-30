<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Movie;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(mt_rand(10, 20)),
            'description' => $this->faker->realText(),
            'poster' => $this->faker->imageUrl(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Movie $movie) {
            //
        })->afterCreating(function (Movie $movie) {
            $branches = Branch::whereDoesntHave('schedules', function (Builder $query) use ($movie){
                $query->where('movie_id', $movie->uuid);
            })->get();

            foreach ($branches as $branch){
                $branch->schedules()->create([
                    'movie_id' => $movie->uuid,
                    'start_at' => $this->faker->dateTimeBetween('-2 weeks', '+1 month'),
                ]);
            }
        });
    }
}
