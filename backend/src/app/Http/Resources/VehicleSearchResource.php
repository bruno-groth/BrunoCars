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
        return $this->resource->rentals->map(fn ($data) => [
            'rental' => [
                'id' => $data->rental->id,
                'name' => $data->rental->name,
                'address' => $data->rental->address,
                'phone' => $data->rental->phone,
            ],
            'vehicles' => $data->vehicles->map(fn ($vehicle) => [
                'nome' => $vehicle->nome,
                'categoria' => $vehicle->categoria,
                'preco' => $vehicle->preco,
            ])
        ]);
    }
}