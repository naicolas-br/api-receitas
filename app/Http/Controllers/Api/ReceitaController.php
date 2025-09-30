<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ReceitaController extends Controller
{
    public function gerarReceita(Request $request)
    {
        $dadosValidados = $request->validate([
            'alimentos' => 'required|array|min:1',
            'alimentos.*' => 'string',
        ]);

        $ingredientes = implode(', ', $dadosValidados['alimentos']);
        $prompt = "Você é um chef de cozinha profissional. Crie uma receita criativa e detalhada, com título, lista de ingredientes e um modo de preparo passo a passo, utilizando os seguintes itens: {$ingredientes}.";

        try {
            $response = Http::withToken(env('HUGGINGFACE_API_KEY'))
                ->timeout(60)
                ->post('https://router.huggingface.co/v1/chat/completions', [
                    'model' => 'deepseek-ai/DeepSeek-V3.1-Terminus',
                    'messages' => [['role' => 'user', 'content' => $prompt]],
                    'max_tokens' => 1024,
                    'temperature' => 0.7,
                ]);

            if ($response->successful()) {
                $receitaGerada = $response->json()['choices'][0]['message']['content'];
                return response()->json(['receita' => $receitaGerada]);
            }

            // CÓDIGO MELHORADO AQUI
            Log::error('Erro da API Chat Completions: Status ' . $response->status() . ' - Corpo: ' . $response->body());
            $errorMessage = $response->json()['error']['message'] ?? $response->body();
            return response()->json(['erro' => 'Não foi possível gerar a receita.', 'detalhes' => $errorMessage], $response->status());

        } catch (\Exception $e) {
            Log::error('Falha na conexão com a API Chat Completions: ' . $e->getMessage());
            return response()->json(['erro' => 'Não foi possível conectar com o serviço de IA.'], 500);
        }
    }
}