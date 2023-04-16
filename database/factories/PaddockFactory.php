<?php

namespace Database\Factories;
use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Race>
 */
class PaddockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Paridero','Bombay', 'Morro azul', 'Caribe']),
            'size' =>$this->faker->randomFloat(1,1,10),
            'animal_number' =>$this->faker->numberBetween(1, 40),
        ];
    }
}
