<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HeroController extends Controller
{
    /**
     * Listar todos os heróis
     * GET /api/heroes
     */
    public function index(Request $request): JsonResponse
    {
        $query = Hero::query();

        // Filtro por classificação
        if ($request->has('classificacao')) {
            $query->where('classificacao', $request->classificacao);
        }

        // Busca por nome
        if ($request->has('busca')) {
            $query->where('nome', 'like', '%' . $request->busca . '%');
        }

        // Ordenação
        $query->orderBy('created_at', 'desc');

        $heroes = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Lista de heróis recuperada com sucesso',
            'data' => $heroes,
            'total' => $heroes->count()
        ], 200);
    }

    /**
     * Criar novo herói
     * POST /api/heroes
     */
    public function store(Request $request): JsonResponse
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'habilidade' => 'required|string',
            'classificacao' => 'required|string|max:10',
            'ponto_fraco' => 'nullable|string',
            'filme' => 'nullable|string|max:255'
        ], [
            'nome.required' => 'O nome do herói é obrigatório',
            'habilidade.required' => 'A habilidade é obrigatória',
            'classificacao.required' => 'A classificação é obrigatória'
        ]);

        // Criar herói
        $hero = Hero::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Herói criado com sucesso!',
            'data' => $hero
        ], 201);
    }

    /**
     * Buscar herói específico
     * GET /api/heroes/{id}
     */
    public function show(string $id): JsonResponse
    {
        $hero = Hero::find($id);

        if (!$hero) {
            return response()->json([
                'success' => false,
                'message' => 'Herói não encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Herói encontrado',
            'data' => $hero
        ], 200);
    }

    /**
     * Atualizar herói existente
     * PUT/PATCH /api/heroes/{id}
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $hero = Hero::find($id);

        if (!$hero) {
            return response()->json([
                'success' => false,
                'message' => 'Herói não encontrado'
            ], 404);
        }

        // Validação dos dados (campos opcionais)
        $validatedData = $request->validate([
            'nome' => 'sometimes|string|max:255',
            'habilidade' => 'sometimes|string',
            'classificacao' => 'sometimes|string|max:10',
            'ponto_fraco' => 'nullable|string',
            'filme' => 'nullable|string|max:255'
        ]);

        // Atualizar herói
        $hero->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Herói atualizado com sucesso!',
            'data' => $hero
        ], 200);
    }

    /**
     * Deletar herói
     * DELETE /api/heroes/{id}
     */
    public function destroy(string $id): JsonResponse
    {
        $hero = Hero::find($id);

        if (!$hero) {
            return response()->json([
                'success' => false,
                'message' => 'Herói não encontrado'
            ], 404);
        }

        $heroNome = $hero->nome;
        $hero->delete();

        return response()->json([
            'success' => true,
            'message' => "Herói '{$heroNome}' deletado com sucesso!"
        ], 200);
    }
}