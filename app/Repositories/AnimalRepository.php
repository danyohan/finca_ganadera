<?php

namespace App\Repositories;

use App\Interfaces\GenericInterface;
use App\Models\Animal;

class AnimalRepository implements GenericInterface
{

    public function create(array $data): void
    {
        Animal::create($data);
    }

    public function update($data, $model): void
    {
       $model->update($data);
    }

    public function delete($id): void
    {
        Animal::destroy($id);
    }

    public function getData()
    {

        return  Animal::join('races', 'animals.race_id', '=', 'races.id')
            ->join('colors', 'animals.color_id', '=', 'colors.id')
            ->select('animals.id', 'animals.name', 'animals.age', 'animals.weight', 'races.name as race', 'colors.name as color_name')
            ->paginate(10);
    }

    public function getById($id)
    {
        return Animal::find($id);
    }
}
