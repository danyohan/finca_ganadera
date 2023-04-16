<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Illnes_detail>
 */
class Illnesses_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'animal_id'  => $this->faker->numberBetween(1,4),
            'illness_id' => $this->faker->numberBetween(1,4),
        ];
    }
}
