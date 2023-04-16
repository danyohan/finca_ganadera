<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Illness>
 */
class IllnessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Mastitis','Brucelosis', 'Fiebre aftosa', 'Bejuco']),
            'symptoms' =>$this->faker->realTextBetween(1,100),
            'duration' =>$this->faker->randomNumber(1,100),
            'cause' =>$this->faker->realTextBetween(1,100),
            'mortal' =>$this->faker->boolean(10),
        ];
    }
}
