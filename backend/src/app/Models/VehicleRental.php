<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model that represents the vehicle rental agency.
 * 
 * PTBR: Locadora de veículos
 * ES: Agencia de alquiler de vehículos
 */
class VehicleRental extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cnpj',
        'address',
        'email',
        'phone',
        'active'
    ];
}