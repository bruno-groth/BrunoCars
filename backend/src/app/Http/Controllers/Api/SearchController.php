<?php

namespace App\Http\Controllers\Api;

use App\Actions\Rentals\SearchVehiclesAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleSearchResource;

class SearchController extends Controller
{
    public function __invoke(SearchVehiclesAction $action)
    {
        $result = $action->execute();
        return VehicleSearchResource::make($result);
    }
}