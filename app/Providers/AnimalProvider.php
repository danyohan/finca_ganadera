<?php

namespace App\Providers;

use App\Http\Controllers\AnimalController;
use App\Interfaces\GenericInterface;
use App\Repositories\AnimalRepository;
use Illuminate\Support\ServiceProvider;

class AnimalProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(AnimalController::class)
            ->needs(GenericInterface::class)
            ->give(function () {
                return new AnimalRepository();
            });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
