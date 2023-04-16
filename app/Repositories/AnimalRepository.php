<?php

namespace App\Repositories;

use App\Interfaces\AnimalInterface;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Model;

class AnimalRepository implements AnimalInterface
{

    public function createAnimal(array $animal): Model
    {
        Animal::create($animal);
    }

    public function updateAnimal($animal): void
    {
        Animal::update($animal);
    }

    public function deleteAnimal($animalId): void
    {
        Animal::destroy($animalId);
    }

    public function getAnimals()
    {
       return  Animal::join('races', 'animals.race_id', '=', 'races.id')
            ->join('colors', 'animals.color_id', '=', 'colors.id')
            ->select('animals.id', 'animals.name', 'animals.age', 'animals.weight', 'races.name as race', 'colors.name as color_name')
            ->paginate(10);

    }
}
