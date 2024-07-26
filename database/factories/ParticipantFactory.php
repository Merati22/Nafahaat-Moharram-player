<?php
// database/factories/ParticipantFactory.php

namespace Database\Factories;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    protected $model = Participant::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'phone_number' => $this->faker->unique()->phoneNumber,
            'address' => $this->faker->address,
            'post_code' => $this->faker->postcode,
            'province' => $this->faker->state,
            'city' => $this->faker->city,
        ];
    }
}
