<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        $this->call([
            ActorSeeder::class,
            MovieSeeder::class,
            DirectorSeeder::class,
            StudioSeeder::class,
            GenreSeeder::class,
            AwardSeeder::class,
            CartSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
            ReviewSeeder::class,
            RatingSeeder::class,
        ]);
    }
}
