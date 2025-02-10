<?php

namespace App\Providers;

use App\Repositories\Contracts\VehicleRentalRepositoryInterface;
use App\Repositories\VehicleRentalRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            VehicleRentalRepositoryInterface::class,
            VehicleRentalRepository::class
        );
    }
}