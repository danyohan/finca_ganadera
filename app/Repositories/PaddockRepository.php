<?php


namespace App\Repositories;

use App\Interfaces\GenericInterface;
use App\Models\Paddock;

class PaddockRepository implements GenericInterface
{
    public function create(array $data): void
    {
        Paddock::create($data);
    }

    public function update($data, $model): void
    {
        $model->update($data);
    }

    public function delete($id): void
    {
        $paddock = Paddock::find($id);
        $paddock->delete();
    }

    public function getData()
    {
        return Paddock::paginate(10);
    }

    public function getById($id)
    {
        return Paddock::find($id);
    }
} 