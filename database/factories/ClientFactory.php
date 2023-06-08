<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->company,
            "email" => $this->faker->companyEmail,
            "phone" => $this->faker->phoneNumber,
            "address" => $this->faker->address,
            "city" => $this->faker->city,
            "state" => $this->faker->city,
            "zip" => $this->faker->postcode,
        ];
    }
}
