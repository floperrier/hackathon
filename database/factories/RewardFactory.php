<?php

namespace Database\Factories;

use App\Models\Reward;
use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Enums\RewardRequiredScoreEnum;

class RewardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reward::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'name' => $name,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(640, 480),
            'required_score' => $this->faker->randomElement(RewardRequiredScoreEnum::values()),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
