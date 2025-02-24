<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RatingSeeder::class,
            MovieSeeder::class,
            UserSeeder::class,
            AwardSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            StudioSeeder::class,
            GenreSeeder::class,
            CartSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
