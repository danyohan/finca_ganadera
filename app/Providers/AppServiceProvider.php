<?php

namespace App\Providers;

use App\Http\Controllers\PaddocksController;
use App\Http\Controllers\testController;
use App\Interfaces\GenericInterface;
use App\Repositories\AnimalRepository;
use App\Repositories\PaddockRepository;
use App\Services\GenericService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
