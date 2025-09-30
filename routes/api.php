<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlimentoController;
use App\Http\Controllers\Api\ReceitaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* Rota do CRUD de Alimentos */
Route::apiResource('alimentos', AlimentoController::class);

/* Rota para gerar a receita */
Route::post('gerar-receita', [ReceitaController::class, 'gerarReceita']);