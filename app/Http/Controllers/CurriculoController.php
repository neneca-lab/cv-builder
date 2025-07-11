<?php

namespace App\Http\Controllers;
use App\Services\AzureBlobService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;


class CurriculoController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(Request $request, AzureBlobService $azureBlobService)
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
        $tempPath = storage_path('app/public/' . $fileName);
        $pdf->save($tempPath);

        $azureUrl = $azureBlobService->uploadFile($tempPath, $fileName);

//        dd($azureUrl);
        unlink($tempPath);

        return redirect()->back()->with('success', 'foi essa porra' . $azureUrl);
    }
}
