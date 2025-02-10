<?php

namespace App\DTOs\Rentals;

/**
 * Este DTO representa um único veículo vindo da API externa. É a menor unidade de dados.
 */
readonly class VehicleDTO
{
    public function __construct(
        public string $nome,
        public string $categoria,
        public float $preco
    ) {}
}