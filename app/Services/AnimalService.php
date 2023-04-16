<?php

namespace App\Services;

use App\Repositories\AnimalRepository;

class AnimalService
{
    private AnimalRepository $animalRepository;

    public function __construct(AnimalRepository $animalRepository)
    {
        $this->animalRepository = $animalRepository;
    }

    public function createAnimal(array $animal): void
    {
        $this->animalRepository->createAnimal($animal);
    }

    public function deleteAnimal(int $animal):void
    {
        $this->animalRepository->deleteAnimal($animal);
    }

    public function updateAnimal(array $animal):void
    {
        //var_dump($animal);die;
        $this->animalRepository->updateAnimal($animal);
    }

    public function getAnimals()
    {
        return $this->animalRepository->getAnimals();
    }
}
