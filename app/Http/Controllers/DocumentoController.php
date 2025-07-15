<?php

namespace App\Http\Controllers;
use App\Models\PdfModel;

class DocumentoController extends Controller {

    public function index()
    {
        $documento = PdfModel::latest()->first();
        return view('init', compact('documento'));
    }
    public function download($arquivo) {
        $documento =  PdfModel::where('arquivo', "$arquivo")->firstOrFail();
//        dd($documento);
        return response()->file(
            storage_path("app/public/documentos/" . $documento->arquivo),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $documento->arquivo . '"',
            ]
        );
    }
}
