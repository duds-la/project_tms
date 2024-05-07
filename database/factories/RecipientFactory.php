<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipient>
 */
class RecipientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'cpf' => $this->faker->unique()->cpf,
            'address' => $this->faker->address,
            'state' => $this->faker->state,
            'cep' => $this->faker->postcode,
            'country' => $this->faker->country,
            'geo_lat' => $this->faker->latitude,
            'geo_lng' => $this->faker->longitude,
        ];
    }
}
