<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Movie;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);

        return [
            'first_name' => fake()->firstName($gender),
            'last_name' => fake()->lastName($gender),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'birth_date' => fake()->date('Y-m-d'),
            'gender' => $gender,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            $movies = Movie::inRandomOrder()->limit(mt_rand(1, 3))->pluck('id');
            $user->wishlists()->attach($movies);
            $user->favorites()->attach($movies);
            $user->reviews()->attach(
                $movies,
                ['movie_score' => fake()->numberBetween(1, 5), 'movie_comment' => fake()->paragraph(),]
            );
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
