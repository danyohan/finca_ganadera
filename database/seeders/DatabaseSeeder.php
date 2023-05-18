<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Color;
use App\Models\illness;
use App\Models\Illnesses_detail;
use App\Models\Paddock;
use App\Models\Race;
use App\Models\Status;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Status::factory(4)->create();
       Color::factory(4)->create();
       Race::factory(4)->create();
       Illness::factory(4)->create();
       Paddock::factory(4)->create();
       AnimalType::factory(4)->create();
       Animal::factory(4)->create();
       Illnesses_detail::factory(4)->create();
      
    }
}
