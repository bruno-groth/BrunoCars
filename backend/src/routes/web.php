<?php

use App\Http\Controllers\Api\VehicleRentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// I, Bruno, would add "v1" to the path to version the API in case we need to make breaking changes in the future.
// Eu, Bruno, adicionaria "v1" ao caminho para definir versão da API, no caso de precisarmos fazer grandes alterações no futuro.
Route::apiResource('locadoras', VehicleRentalController::class);

Route::get('/pesquisa')