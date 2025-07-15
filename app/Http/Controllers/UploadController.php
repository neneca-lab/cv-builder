<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AzureBlobService;
class UploadController extends Controller{
    public function upload(Request $request, AzureBlobService $azureBlobService){
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $url = $azureBlobService->uploadFile($request->file('pdf'));

        return back()->with('success', $url);
    }
}
