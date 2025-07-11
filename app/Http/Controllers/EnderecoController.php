<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller {
    public function buscarEndereco($cep) {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->successful()) {
            return response()->json($response->json());
        }
        return response()->json(['erro' => 'CEP inválido ou não encontrado.'], 404);
    }
}
