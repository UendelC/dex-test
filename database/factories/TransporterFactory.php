<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transporter>
 */
class TransporterFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'neighborhood' => $this->faker->word,
            'city' => $this->faker->city,
            'state_code' => $this->faker->stateAbbr,
            'credit_limit' => $this->faker->numberBetween(1000, 10000),
            'credit_analysis_date' => $this->faker->date(),
        ];
    }
}
