<?php

use App\Http\Controllers\HeroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rota de teste
Route::get('/', function () {
    return response()->json([
        'message' => 'API de Heróis da Marvel',
        'version' => '1.0.0',
        'endpoints' => [
            'GET /api/heroes' => 'Listar todos os heróis',
            'POST /api/heroes' => 'Criar novo herói',
            'GET /api/heroes/{id}' => 'Buscar herói específico',
            'PUT /api/heroes/{id}' => 'Atualizar herói',
            'DELETE /api/heroes/{id}' => 'Deletar herói'
        ]
    ]);
});

// Rotas CRUD de Heróis
Route::apiResource('heroes', HeroController::class);
