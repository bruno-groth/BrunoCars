<?php

namespace App\DTOs\Rentals;

use Illuminate\Support\Collection;
/**
 * Este é o DTO final que representa todo o resultado da pesquisa, contendo todas as locadoras e seus respectivos veículos.
 * 
 */
readonly class VehicleSearchResultDTO
{
    public function __construct(
        public Collection $rentals
    ) {}
}
