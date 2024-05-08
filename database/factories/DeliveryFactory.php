<?php

namespace Database\Factories;

use App\Models\Recipient;
use App\Models\Sender;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sender_id = Sender::exists() ? Sender::inRandomOrder()->first()->id : Sender::factory()->create()->id;
        $tracking_id = Tracking::exists() ? Tracking::inRandomOrder()->first()->id : Tracking::factory()->create()->id;
        $recipient_id = Recipient::exists() ? Recipient::inRandomOrder()->first()->id : Recipient::factory()->create()->id;

        return [
            'sender_id' => $sender_id,
            'tracking_id' => $tracking_id,
            'recipient_id' => $recipient_id,
            'delivery_uuid' => $this->faker->uuid(),
            'volumes' => $this->faker->numerify('#'),
            'carrier_uuid' => $this->faker->uuid(),

        ];
    }
}
