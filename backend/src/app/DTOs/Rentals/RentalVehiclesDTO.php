<?php

namespace App\DTOs\Rentals;

use App\Models\VehicleRental;
use Illuminate\Support\Collection;
/**
 * Este DTO representa a associação entre uma locadora e seus veículos. É um agrupamento de veículos por locadora.
 */
readonly class RentalVehiclesDTO
{
    public function __construct(
        public VehicleRental $rental,
        public Collection $vehicles
    ) {}
}