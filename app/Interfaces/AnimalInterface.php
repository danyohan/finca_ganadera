<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface AnimalInterface
{
    public function createAnimal(array $animal):Model;
    public function updateAnimal(array $animal):void;
    public function deleteAnimal($animalId):void;

}
