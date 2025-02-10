<?php

namespace App\Repositories;

use App\Models\VehicleRental;
use App\Repositories\Contracts\VehicleRentalRepositoryInterface;
use Illuminate\Support\Collection;

class VehicleRentalRepository implements VehicleRentalRepositoryInterface
{
    public function getActive(): Collection
    {
        return VehicleRental::where('active', true)->get();
    }
}