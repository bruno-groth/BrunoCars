<?php

namespace App\Actions\Rentals;

use App\Actions\Contracts\ActionInterface;
use App\DTOs\Rentals\RentalVehiclesDTO;
use App\DTOs\Rentals\VehicleDTO;
use App\DTOs\Rentals\VehicleSearchResultDTO;
use App\Repositories\Contracts\VehicleRentalRepositoryInterface;
use App\Services\Api\VehicleApiClient;
use Exception;
use Illuminate\Support\Facades\Log;

class SearchVehiclesAction implements ActionInterface
{
    public function __construct(
        private VehicleRentalRepositoryInterface $rentalRepository,
        private VehicleApiClient $apiClient
    ) {}

    public function execute(): VehicleSearchResultDTO
    {
        $activeRentals = $this->rentalRepository->getActive();
        
        $results = $activeRentals->map(function ($rental) {
            try {
                $vehicles = $this->apiClient->fetchVehicles($rental);
                return new RentalVehiclesDTO(
                    rental: $rental,
                    vehicles: $vehicles->map(fn ($v) => new VehicleDTO(...$v))
                );
            } catch (Exception $e) {
                Log::error('Failed to fetch vehicles', [
                    'rental_id' => $rental->id,
                    'error' => $e->getMessage()
                ]);
                return null;
            }
        })->filter();
        
        return new VehicleSearchResultDTO($results);
    }
}

