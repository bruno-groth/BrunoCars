<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface VehicleRentalRepositoryInterface
{
    public function getActive(): Collection;
}