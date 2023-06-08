<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clients = \App\Models\Client::all();

        $hasClient = $this->faker->boolean();
        $clientId = null;

        if ($hasClient) {
            $clientId = Arr::random($clients->pluck('id')->toArray());
            $available = \App\Enums\AvailableEnum::ASSIGNED->value;
        } else {
            $enum = array_filter(\App\Enums\AvailableEnum::values(), function ($v) {
                return $v !== \App\Enums\AvailableEnum::ASSIGNED->value;
            });
            $available = Arr::random($enum);
        }

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'client_id' =>  $clientId,
            'job_title' => $this->faker->jobTitle(),
            'salary' => $this->faker->numberBetween(1000, 10000),
            'available' => $available,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
