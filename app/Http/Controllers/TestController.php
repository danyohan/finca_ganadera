<?php

namespace App\Http\Controllers;

use App\Interfaces\GenericInterface;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $genericInterface;
    public function __construct(GenericInterface $genericInterface) {
       $this->genericInterface = $genericInterface;
    }


    public function getAll()
    {
       return $this->genericInterface->getData();
    }
}
