<?php

namespace App\Http\Controllers;
use App\Services\AzureBlobService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\PdfModel;


class CurriculoController extends Controller {



    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string',
            'cidade' => 'string',
            'estado' => 'string|max:2',
            'pais' => 'required|string',
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

        $data = $request->only(['nome', 'cargo', 'cidade' , 'estado', 'pais','email', 'linkedin', 'gitHub', 'perfil', 'formacao', 'experiencia', 'tecnologia', 'atividade', 'habilidades', 'idioma']);

        $pdf = Pdf::loadView('pdf.curriculo', compact('data'))->setPaper('a4', 'portrait');

        $fileName = Str::slug($request->nome) . '-' . time() . '.pdf';
        $tempPath = storage_path('app/public/documentos/' . $fileName);


        $pdf->save($tempPath);

        PdfModel::create(['arquivo' => $fileName]);


        return redirect()->route('init');
    }
}
