<?php

namespace App\Http\Controllers\Api;

use App\Models\Alimento;
use Illuminate\Http\Request;

class AlimentoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Alimento::all(); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // 1. Valida os dados recebidos
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        // 2. Cria o alimento no banco de dados
        $alimento = Alimento::create($dadosValidados);

        // 3. Retorna o alimento criado como resposta
        return response()->json($alimento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alimento $alimento)
    {
        return $alimento;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alimento $alimento)
    {
        // 1. Valida os dados (similar ao store)
        $dadosValidados = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        // 2. Atualiza o alimento com os novos dados
        $alimento->update($dadosValidados);

        // 3. Retorna o alimento já atualizado
        return $alimento;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alimento $alimento)
    {
        // 1. Apaga o registro do banco de dados
        $alimento->delete();

        // 2. Retorna uma resposta de sucesso sem conteúdo
        return response()->noContent();
    }
}
