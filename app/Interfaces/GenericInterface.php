<?php

namespace App\Interfaces;

interface GenericInterface
{
    public function create(array $data):void;
    public function update(array $data, $model):void;
    public function delete(int $id):void;
    public function getData();
    public function getById($id);

}
