<?php

namespace App\Services\Api;

use App\Models\RentalAgency;
use App\Models\VehicleRental;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class VehicleApiClient
{
    public function fetchVehicles(VehicleRental $rental): Collection
    {
        $response = Http::get("http://aluguel-carros-json-api-1:3000/vehicles");
        
        if (!$response->successful()) {
            throw new Exception('Failed to fetch vehicles');
        }

        return collect($response->json());
    }
}