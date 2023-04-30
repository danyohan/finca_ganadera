<?php

namespace App\Providers;

use App\Http\Controllers\PaddocksController;
use App\Interfaces\GenericInterface;
use App\Repositories\PaddockRepository;
use App\Services\GenericService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PaddockProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
       // $this->app->instance(GenericInterface::class, GenericService::class);

           $this->app->when(PaddocksController::class)
          ->needs(GenericInterface::class)
          ->give(function(){
            return new PaddockRepository();
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
