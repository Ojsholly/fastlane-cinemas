<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'Fast Lane',
             'email' => 'admin@fastlane-cinemas.com',
         ]);

        $this->call([BranchSeeder::class]);
        $this->call([MovieSeeder::class]);
    }
}
