<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence();
        return [
            'name'           => null,
            'race_id'        =>$this->faker->numberBetween(1,4),
            'color_id'       =>$this->faker->numberBetween(1,4),
            'paddock_id'     =>$this->faker->numberBetween(1,4),
            'status_id'      =>$this->faker->numberBetween(1,4),
            'animal_type_id' =>$this->faker->numberBetween(1,4),
            'age'            =>$this->faker->numberBetween(1,10),
            'weight'         =>$this->faker->randomFloat(1,1,10),
            'slug'           => Str::slug($name, '-')

        ];
    }
}
