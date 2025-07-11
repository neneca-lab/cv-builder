<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class CurriculoController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string',
            'cidade' => 'string',
            'estado' => 'string|max:2',
            'email' => 'required|email',
            'linkedin' => 'required|string',
            'gitHub' => 'required|string',
            'perfil' => 'required|string',
            'formacao' => 'required|string',
            'experiencia' => 'required|string',
            'tecnologia' => 'required|string',
            'atividade' => 'required|string',
            'habilidades' => 'required|string',
            'idioma' => 'required|string',
        ]);

        $data = $request->only(['nome', 'cargo', 'cidade' , 'estado','email', 'linkedin', 'gitHub', 'perfil', 'formacao', 'experiencia', 'tecnologia', 'atividade', 'habilidades', 'idioma']);

        $pdf = Pdf::loadView('pdf.curriculo', compact('data'))->setPaper('a4', 'portrait');

        return $pdf->stream('curriculo_' . strtolower(str_replace(' ', '_', $data['nome'])) . '.pdf');
    }
}
