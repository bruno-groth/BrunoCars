<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VehicleRental;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(VehicleRental::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:vehicle_rentals'
        ]);

        $rental = VehicleRental::create($validated);
        return response()->json($rental, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleRental $vehicleRental)
    {
        return response()->json($vehicleRental);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleRental $vehicleRental): JsonResponse   
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'cnpj' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'email' => 'email|unique:vehicle_rentals,email,' . $vehicleRental->id
        ]);
    
        $vehicleRental->update($validated);
        return response()->json($vehicleRental);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleRental $vehicleRental): JsonResponse
    {
        $vehicleRental->delete();
        return response()->json(null, 204);
    }
}
