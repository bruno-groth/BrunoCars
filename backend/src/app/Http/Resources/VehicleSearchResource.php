<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Transforma os VehicleSearchResultDTO em arrays/JSON para a resposta da API
 */
class VehicleSearchResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->resource->rentals->map(fn ($rental) => [
            'rental' => [
                'id' => $rental->rental->id,
                'name' => $rental->rental->name,
            ],
            'vehicles' => $rental->vehicles->map(fn ($vehicle) => [
                'nome' => $vehicle->nome,
                'categoria' => $vehicle->categoria,
                'preco' => $vehicle->preco,
            ])
        ]);
    }
}