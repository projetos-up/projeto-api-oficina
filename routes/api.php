<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\OrdemServicoController;

// Rotas de Clientes (GET, POST, DELETE)
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

// Rotas de Veículos (GET, POST, DELETE)
Route::get('/veiculos', [VeiculoController::class, 'index']);
Route::post('/veiculos', [VeiculoController::class, 'store']);
Route::delete('/veiculos/{id}', [VeiculoController::class, 'destroy']);

// Rotas de Ordens de Serviço (GET, POST, DELETE, RESUMO)
Route::get('/ordens-servico', [OrdemServicoController::class, 'index']);
Route::post('/ordens-servico', [OrdemServicoController::class, 'store']);
Route::delete('/ordens-servico/{id}', [OrdemServicoController::class, 'destroy']);
Route::get('/ordens-servico/resumo', [OrdemServicoController::class, 'resumo']);


// Rotas de exclusão (DELETE)
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);
Route::delete('/veiculos/{id}', [VeiculoController::class, 'destroy']);