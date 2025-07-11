<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\UploadController;

Route::get('/', function () {

    return view('welcome');
});


Route::post('/curriculo', [CurriculoController::class, 'store'])->name('curriculo.store');
Route::get('/consulta-cep/{cep}', [EnderecoController::class, 'buscarEndereco']);



Route::get('/upload', [UploadController::class, 'uploadForm']);
Route::post('/upload', [UploadController::class, 'upload'])->name('upload.pdf');
